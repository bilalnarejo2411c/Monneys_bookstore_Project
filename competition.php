<?php 
include('includes/navbar.php');
include('data/databases.php');

$submitted = false;
$successMsg = $errorMsg = '';

// Handle form submission
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = htmlspecialchars($_POST['username']);
    $title = htmlspecialchars($_POST['title']);

    if(isset($_FILES['file']) && $_FILES['file']['error'] === 0){
        $allowed = ['pdf','doc','docx'];
        $fileName = $_FILES['file']['name'];
        $fileTmp = $_FILES['file']['tmp_name'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if(in_array($fileExt, $allowed)){
            $newFileName = uniqid() . '_' . $fileName;
            $uploadDir = 'uploads/';
            if(!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

            $filePath = $uploadDir . $newFileName;
            if(move_uploaded_file($fileTmp, $filePath)){
                $stmt = $conn->prepare("INSERT INTO competition_submissions (username, title, file_path) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $username, $title, $filePath);
                if($stmt->execute()){
                    $successMsg = "Submission received successfully!";
                    $submitted = true;
                } else {
                    $errorMsg = "Database error: " . $stmt->error;
                }
                $stmt->close();
            } else {
                $errorMsg = "Failed to upload file.";
            }
        } else {
            $errorMsg = "Invalid file type. Only PDF/DOC/DOCX allowed.";
        }
    } else {
        $errorMsg = "Please upload a file.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Competition Page - Online E-Book System</title>
<style>
html, body { height: 100%; margin: 0; font-family: 'Georgia', serif; background: linear-gradient(135deg,#541212,#154D71); display: flex; flex-direction: column; }
main { flex: 1; display: flex; flex-direction: column; }
.competition-container { max-width: 850px; margin: 40px auto; background: #fffdfd; padding: 30px; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.15); border-left: 6px solid #2980b9; }
.competition-container h2 { text-align: center; font-size: 1.8rem; margin-bottom: 20px; color: #2c3e50; }
.competition-container .username { color: #2980b9; font-weight: bold; font-size: 2rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.2); margin-right: 10px; animation: shimmer 2s linear infinite; }
@keyframes shimmer { 0% { text-shadow:1px 1px 2px rgba(0,0,0,0.2);} 50%{ text-shadow:1px 1px 10px rgba(41,128,185,0.8);} 100%{ text-shadow:1px 1px 2px rgba(0,0,0,0.2);} }
.competition-container label { display:block; margin-top:15px; font-weight:bold; color:#34495e; }
.competition-container input[type="text"], .competition-container input[type="file"], .competition-container textarea { width:100%; padding:12px; margin-top:5px; border-radius:8px; border:1px solid #ccc; font-size:1rem; box-sizing:border-box; }
.competition-container button { position:relative; background: linear-gradient(135deg,#541212,#154D71); color:white; padding:12px 25px; margin-top:25px; border:none; border-radius:8px; cursor:pointer; font-size:1.1rem; font-weight:bold; overflow:hidden; z-index:0; box-shadow:0 4px 8px rgba(0,0,0,0.2); transition:all 0.3s ease; }
.competition-container button:before { content:''; position:absolute; top:0; left:-75%; width:50%; height:100%; background:linear-gradient(120deg,rgba(255,255,255,0.6), rgba(255,255,255,0)); transform:skewX(-25deg); transition:all 0.5s ease; }
.competition-container button:hover:before { left:125%; }
.competition-container button:hover { transform:translateY(-2px); }
.competition-container button:disabled { background:#95a5a6; cursor:not-allowed; }
.timer { margin-top:15px; font-weight:bold; color:#c0392b; text-align:center; font-size:1.2rem; }
.competition-modal { display:none; position:fixed; z-index:999; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.6); }
.competition-modal-content { background-color:#fff; margin:10% auto; padding:20px; border-radius:10px; width:80%; max-width:500px; text-align:center; box-shadow:0 8px 20px rgba(0,0,0,0.3); }
.competition-modal-content h2 { color:#c0392b; }
.competition-modal-content ul { list-style:none; padding-left:0; }
.competition-modal-content li { padding:8px 0; border-bottom:1px solid #ddd; font-size:1.05rem; }
.competition-modal .close { color:#c0392b; float:right; font-size:28px; font-weight:bold; cursor:pointer; }
footer { background:#333; color:#fff; text-align:center; padding:15px 0; }
</style>
</head>
<body>
<main>
<div class="competition-container">
    <h2>
        <?php 
            if(isset($_SESSION['username'])) {
                echo '<span class="username">' . htmlspecialchars($_SESSION['username']) . '</span> submitted your Essay / Story';
            } else {
                echo 'Submit Your Essay / Story';
            }
        ?>
    </h2>

    <?php 
        if($successMsg) echo "<p style='color:green;text-align:center;'>$successMsg</p>";
        if($errorMsg) echo "<p style='color:red;text-align:center;'>$errorMsg</p>";
    ?>

    <p class="timer" id="timer">03:00:00</p>

    <form id="competitionForm" method="POST" enctype="multipart/form-data">
        <label for="username">Your Name:</label>
        <input type="text" id="username" name="username" value="<?php echo $_SESSION['username'] ?? ''; ?>" required <?php if($submitted) echo 'disabled'; ?> >

        <label for="title">Title of Essay / Story:</label>
        <input type="text" id="title" name="title" required <?php if($submitted) echo 'disabled'; ?> >

        <label for="file">Upload Document:</label>
        <input type="file" id="file" name="file" accept=".pdf,.doc,.docx" required <?php if($submitted) echo 'disabled'; ?> >

        <button type="submit" id="submitBtn" <?php if($submitted) echo 'disabled style="background:#95a5a6;cursor:not-allowed;"'; ?> >
            <?php echo $submitted ? "Submitted" : "Submit"; ?>
        </button>
    </form>
</div>
</main>

<!-- Modal -->
<div id="winnerModal" class="competition-modal">
  <div class="competition-modal-content">
    <span class="close" id="closeModal">&times;</span>
    <h2>Time's Up!</h2>
    <ul>
        <li>Ali Khan - Best Story - Prize: Free Books</li>
        <li>Sara Ahmed - Best Essay - Prize: G.K. Book</li>
        <li>Faizan - Creative Writing - Prize: Grammar Book</li>
    </ul>
  </div>
</div>

<script>
// Timer
let timerElement = document.getElementById('timer');
let submitBtn = document.getElementById('submitBtn');
let totalSeconds = 10800; // 3 hours

let timer = setInterval(function() {
    let hrs = Math.floor(totalSeconds / 3600);
    let mins = Math.floor((totalSeconds % 3600) / 60);
    let secs = totalSeconds % 60;
    timerElement.textContent = `${hrs.toString().padStart(2,'0')}:${mins.toString().padStart(2,'0')}:${secs.toString().padStart(2,'0')}`;
    totalSeconds--;

    if(totalSeconds < 0){
        clearInterval(timer);
        timerElement.textContent = "Time's Up!";
        submitBtn.disabled = true;
        document.getElementById('winnerModal').style.display = "block";
    }
});

// Modal Close
document.getElementById('closeModal').onclick = function() {
    document.getElementById('winnerModal').style.display = "none";
}
window.onclick = function(event) {
    if(event.target == document.getElementById('winnerModal')) {
        document.getElementById('winnerModal').style.display = "none";
    }
}

// Disable form submit if time's up
document.getElementById('competitionForm').addEventListener('submit', function(e){
    if(totalSeconds < 0){
        e.preventDefault();
        alert("Time is up! You cannot submit.");
    }
});
</script>

<?php include('includes/footer.php'); ?>
</body>
</html>
