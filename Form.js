// Beginning of Code -- !OWN CODE!
document.addEventListener('DOMContentLoaded', function() {
    // Defining the Radio buttons in JavaScript using the IDs from Home.php
    const pupilRadio = document.getElementById('pupils');
    const teacherRadio = document.getElementById('teachers');
    const teachingassistRadio = document.getElementById('teachingassists');
    const parentRadio = document.getElementById('parents');
    const familyRadio = document.getElementById('families');
    const classesRadio = document.getElementById('classes');
    
    // Defining the Forms in JavaScript using the IDs from Home.php
    const pupilForm = document.getElementById('pupilform');
    const teacherForm = document.getElementById('teacherform');
    const teachingassistForm = document.getElementById('teachingassistform');
    const parentForm = document.getElementById('parentform');
    const familyForm = document.getElementById('familiesform');
    const classesForm = document.getElementById('classesform');
    
    // Function to hide all forms
    function hideForms() {
        pupilForm.style.display = 'none';
        teacherForm.style.display = 'none';
        teachingassistForm.style.display = 'none';
        parentForm.style.display = 'none';
        familyForm.style.display = 'none'
        classesForm.style.display = 'none';
    }

    // Listening for Radio button "pupilRadio" to be active - Once active, execute code
    pupilRadio.addEventListener('change', function() {
        //Hides other forms and displays Pupil Form
        hideForms();
        pupilForm.style.display = 'block';
    });

    // Listening for Radio button "teacherRadio" to be active - Once active, execute code
    teacherRadio.addEventListener('change', function() {
        //Hides other forms and displays Teacher Form
        hideForms();
        teacherForm.style.display = 'block'; 
    });

    // Listening for Radio button "teacherRadio" to be active - Once active, execute code
    teachingassistRadio.addEventListener('change', function() {
        //Hides other forms and displays Teacher Form
        hideForms();
        teachingassistForm.style.display = 'block'; 
    });

    // Listening for Radio button "parentRadio" to be active - Once active, execute code
    parentRadio.addEventListener('change', function() {
        //Hides other forms and displays Parent Form
        hideForms();
        parentForm.style.display = 'block'; 
    });

    // Listening for Radio button "parentRadio" to be active - Once active, execute code
    familyRadio.addEventListener('change', function() {
        //Hides other forms and displays family Form
        hideForms();
        familyForm.style.display = 'block'; 
    });

    // Listening for Radio button "classesRadio" to be active - Once active, execute code
    classesRadio.addEventListener('change', function() {
        //Hides other forms and displays Classes Form
        hideForms();
        classesForm.style.display = 'block'; 
    });
});
// End of Code -- !OWN CODE!