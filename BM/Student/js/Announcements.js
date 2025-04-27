document.addEventListener("DOMContentLoaded", () => {
  fetch("../../php/student_announcements.php")
    .then(response => response.json())
    .then(data => {
      const container = document.getElementById("announcements-container");

      if (data.length === 0) {
        container.innerHTML += "<p>No announcements found.</p>";
        return;
      }

      data.forEach(announcement => {
        const div = document.createElement("div");
        div.classList.add("announcement");

        div.innerHTML = `
          <h2>${announcement.title}</h2>
          <p>${announcement.message}</p>
        `;

        container.appendChild(div);
      });
    })
    .catch(error => {
      console.error("Error loading announcements:", error);
    });
});
