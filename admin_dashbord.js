function showSection(sectionId) {
            const sections = document.querySelectorAll('.section');
            sections.forEach(sec => sec.style.display = 'none'); // hide all
            document.getElementById(sectionId).style.display = 'block';
            document.getElementById('section-title').innerText = sectionId.charAt(0).toUpperCase() + sectionId.slice(1);
        }

 
function openEditForm(sl, name, phone, email, subject, description, status) {
    document.getElementById("editBox").style.display = "block";

    document.getElementById("edit_sl").value = sl;
    document.getElementById("edit_name").value = name;
    document.getElementById("edit_phone").value = phone;
    document.getElementById("edit_email").value = email;
    document.getElementById("edit_subject").value = subject;
    document.getElementById("edit_description").value = description;
    document.getElementById("edit_status").value = status;
}

function closeEditForm() {
    document.getElementById("editBox").style.display = "none";
}


// User Edit Update Section 
