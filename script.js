console.log("Javascript ran")
function addNote() {
    const title = document.getElementById("note-title").value;
    const content = document.getElementById("note-content").value;

    if (title && content) {
        const notesList = document.getElementById("notes-list");

        const noteDiv = document.createElement("div");
        noteDiv.className = "note";

        noteDiv.innerHTML = `
            <h3>${title}</h3>
            <p>${content}</p>
            <button class="delete-btn" onclick="deleteNote(this)">Delete</button>
        `;

        notesList.appendChild(noteDiv);

        document.getElementById("note-title").value = "";
        document.getElementById("note-content").value = "";
    } else {
        alert("Please enter both title and content for the note.");
    }
}

function deleteNote(button) {
    button.parentElement.remove();
}
