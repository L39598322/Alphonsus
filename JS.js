// Beginning of Code -- !OWN CODE!
document.addEventListener('DOMContentLoaded', function() {
    // Constantly reading activity of radio buttons - Defined as [*]Radio
    const pupilRadio = document.getElementById('pupils');
    const teacherRadio = document.getElementById('teachers');
    const teachingassistRadio = document.getElementById('teachingassists');
    const parentRadio = document.getElementById('parents');
    const familyRadio = document.getElementById('families');
    const classesRadio = document.getElementById('classes');
    
    // Constantly reading activity of Forms - Defined as [*]Form
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

    // Listening for Radio button "pupilRadio" to be active
    pupilRadio.addEventListener('change', function() {
        //Hides other forms and displays Pupil Form
        hideForms();
        pupilForm.style.display = 'block';
    });

    // Listening for Radio button "teacherRadio" to be active
    teacherRadio.addEventListener('change', function() {
        //Hides other forms and displays Teacher Form
        hideForms();
        teacherForm.style.display = 'block'; 
    });

    // Listening for Radio button "teacherRadio" to be active
    teachingassistRadio.addEventListener('change', function() {
        //Hides other forms and displays Teacher Form
        hideForms();
        teachingassistForm.style.display = 'block'; 
    });

    // Listening for Radio button "parentRadio" to be active
    parentRadio.addEventListener('change', function() {
        //Hides other forms and displays Parent Form
        hideForms();
        parentForm.style.display = 'block'; 
    });

    // Listening for Radio button "parentRadio" to be active
    familyRadio.addEventListener('change', function() {
        //Hides other forms and displays family Form
        hideForms();
        familyForm.style.display = 'block'; 
    });

    // Listening for Radio button "classesRadio" to be active
    classesRadio.addEventListener('change', function() {
        //Hides other forms and displays Classes Form
        hideForms();
        classesForm.style.display = 'block'; 
    });
});
// End of Code -- !OWN CODE!