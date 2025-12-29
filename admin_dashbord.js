function showSection(sectionId) {
            const sections = document.querySelectorAll('.section');
            sections.forEach(sec => sec.style.display = 'none'); // hide all
            document.getElementById(sectionId).style.display = 'block';
            document.getElementById('section-title').innerText = sectionId.charAt(0).toUpperCase() + sectionId.slice(1);
        }

       