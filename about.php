<?php
session_start();
include 'includes/header.php';
?>

<div class="container" style="max-width: 800px; padding: 20px; margin: 0 auto;">
    <h2 style="margin-bottom: 20px;">About IT Student Resource Hub</h2>
    
    <div style="background-color: var(--card-bg, #ffffff); border: 1px solid var(--border-color, #cccccc); padding: 20px; border-radius: 5px;">
        <p style="line-height: 1.6; font-size: 1.1em;">
            The <strong>IT Student Resource Hub</strong> is a centralized educational platform designed to help Information Technology students easily access, organize, and share academic materials. Our goal is to streamline the distribution of study resources, notes, and reference documents across all semesters.
        </p>
        
        <h3 style="margin-top: 25px; border-bottom: 1px solid var(--border-color, #cccccc); padding-bottom: 5px;">Platform Features</h3>
        <ul style="line-height: 1.8; padding-left: 20px;">
            <li>Secure user authentication and session management</li>
            <li>Organized study materials categorized by semester and subject</li>
            <li>Seamless file uploads for PDFs, DOCX, and PNGs</li>
            <li>Modern, accessible UI with an integrated Dark Mode</li>
        </ul>

        <h3 style="margin-top: 25px; border-bottom: 1px solid var(--border-color, #cccccc); padding-bottom: 5px;">Developed By</h3>
        <p style="line-height: 1.6; margin-top: 10px;">
            <strong>Pondharani Devendra</strong><br>
            TYIT Student, B.Sc. IT<br>
            SIWS College, University of Mumbai
        </p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>