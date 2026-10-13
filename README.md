# 🎓 IT Student Resource Hub

The **IT Student Resource Hub** is a centralized, secure web platform designed to eliminate the chaos of scattered study materials. It provides a single reliable repository where university students can easily access, organize, and share academic resources like PDFs and notes by semester and subject.

Developed as a TYIT mini-project, this application features secure user authentication, file validation, and a modern UI with a persistent Dark Mode.

## ✨ Key Features

* **Secure Authentication:** User registration and login with password hashing.
* **Role-Based Sessions:** Persistent session management ensuring secure access to dashboards and profiles.
* **Resource Management:** Upload, categorize, and download study materials (PDF, DOCX, PNG) sorted by semester and subject.
* **Accessible UI:** Responsive design with a session-persistent Light/Dark mode toggle.
* **Cloud Deployment:** Live continuous deployment via GitHub and Clever Cloud.

## 🛠️ Tech Stack

* **Frontend:** HTML5, CSS3, Vanilla JavaScript
* **Backend:** PHP 8.x
* **Database:** MySQL (PDO for secure database interactions)
* **Hosting & CI/CD:** Clever Cloud, GitHub integrations

## 🚀 Live Demo

*The project is currently deployed and live on Clever Cloud.*
**Link:** [https://dharani-it-hub.cleverapps.io](https://dharani-it-hub.cleverapps.io)

## 💻 Local Setup & Installation

To run this project locally on your machine, you will need a local server environment like XAMPP or MAMP.

1. **Clone the repository:**
   ```bash
   git clone https://github.com/Dharani-dev22/it-resource-hub.git
   ```

2. **Move to the server directory:**
   Place the cloned folder into your XAMPP `htdocs` directory (or MAMP `htdocs`).

3. **Set up the Database:**
   * Open PHPMyAdmin (`http://localhost/phpmyadmin`).
   * Create a new database named `it_resource_hub`.
   * Import the provided SQL schema (if you have an `init.sql` or similar file, otherwise manually create the `users` and `materials` tables).

4. **Configure Database Connection:**
   * Open `includes/db.php`.
   * Ensure the DB credentials match your local setup (usually `root` with no password).

5. **Run the Application:**
   * Open your browser and navigate to `http://localhost/it-resource-hub/`.

## 👨‍💻 Developer

**Pondharani Devendra**  
*TYIT Student, B.Sc. IT*  
*SIWS College, University of Mumbai*  

*If you find this project helpful, feel free to leave a ⭐ on the repository!*
