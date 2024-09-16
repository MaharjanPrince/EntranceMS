localStorage.clear();
let questionCounter = 1;
let totalQuestions = 10;




// this is fetching question from exam.php

// fetching question and converting to json format
let jsonQuestion = document.getElementById('question-container').innerText;
jsonQuestion = JSON.parse(jsonQuestion);
// console.log(jsonQuestion);

// Storing Questions in localStorage in JSON format
for (let questionsCollection in jsonQuestion) {
    //Question1
    localStorage.setItem(questionsCollection, JSON.stringify(jsonQuestion[questionsCollection]));
}

// Injecting questions into interface
let questionNum = document.getElementById('qn number');
let question = document.getElementById('question');
let questionObj;

let qnIndicator = document.getElementById('qnIndicator');


let options = document.querySelectorAll('.options');

const radios = document.querySelectorAll('input[type="radio"]');
const storedValue = '3';
// const storedValue = localStorage.getItem(`qid${questionCounter}`);



function questionUpdater() {
    qnIndicator.innerText = `Question ${questionCounter} of ${totalQuestions}`;
    questionNum.innerText = `Question ${questionCounter}`;
    questionObj = JSON.parse(localStorage.getItem(`Question ${questionCounter}`));
    question.innerText = questionObj.Qn;
    optionsCreator();
}
questionUpdater();


function optionsCreator() {
    // Array.from(options).forEach((element) => {
    //         element.classList.remove('correct');
    //     }if (element.classList.contains("correct")) {
        
    // });

    Array.from(options).forEach((element, index) => {
        element.innerText = questionObj.options[`option${index + 1}`];
        // if (element.innerText.includes("#$")) {
        //     element.innerText = element.innerText.slice(0, element.innerText.length - 2);
        //     element.classList.add('correct');
        // }
    });

    const storedValue = localStorage.getItem(`qid${questionCounter}`);
    radios.forEach((radio) => {
        if (radio.value === storedValue) {
            radio.checked = true;  // Check if stored value matches radio value
        } else {
            radio.checked = false;  // Uncheck otherwise
        }
    });
}


// Navigating Questions
let nextBtn = document.getElementById('next');
let prevBtn = document.getElementById('prev');

nextBtn.addEventListener('click', next);
prevBtn.addEventListener('click', prev);


function sendMarks(){
    // Number to be sent to the server
    let resultData = {
        "marks": correctedProgress.length
    }



    fetch('/entrancems/exampage/partials/_handle_submission.php', {
        "method": "POST",
        "headers": {
            "Content-Type": "application/json; charset=utf-8"
        },
        "body": JSON.stringify(resultData)
    })
        .then(response => response.text())
        .then(result => {
            console.log('Success:', result);
        })
        .catch(error => {
            console.error('Error:', error);
        });

}

function submit() {
    if (confirm("are you sure?")) {
        sendMarks();
        // console.log("pressed confirm");
    }
    else {
        console.log("canceled");
    }
    window.location.replace("submitted.html");
}

// next to submit button 
function addSubmit() {
    nextBtn.textContent = "Submit";
    nextBtn.removeEventListener('click', next);
    nextBtn.addEventListener('click', submit);
}

// submit to next button 
function removeSubmit() {
    nextBtn.textContent = "Next";
    nextBtn.removeEventListener('click', submit);
    nextBtn.addEventListener('click', next);
}


function next() {
    if (questionCounter == totalQuestions - 1)
        addSubmit();

    if (questionCounter == totalQuestions) {
        return;
    }
    questionCounter++;
    questionUpdater();
}

function prev() {
    if (questionCounter == totalQuestions)
        removeSubmit();
    if (questionCounter == 1) {
        return;
    }
    questionCounter--;
    questionUpdater();
}

//Timer function
let hours = document.getElementById('hours');
let minutes = document.getElementById('minutes');
let seconds = document.getElementById('seconds');

let currentTime = new Date().getTime();
const updatedTime = new Date(currentTime + .5 * 60 * 60 * 1000);

function updateCountdowntime() {

    currentTime = new Date();
    const diff = updatedTime - currentTime; // in milliseconds
    const h = Math.floor(diff / 1000 / 60 / 60) % 24;
    const m = Math.floor(diff / 1000 / 60) % 60;
    const s = Math.floor(diff / 1000) % 60;

    hours.innerHTML = h < 10 ? '0' + h : h;
    minutes.innerHTML = m < 10 ? '0' + m : m;
    seconds.innerHTML = s < 10 ? '0' + s : s;

}

setInterval(updateCountdowntime, 1000); // 1seconds



// question fetch function

let correctedProgress = [];
// Save the current question number in localStorage
function saveProgress(questionNum, selectedOption) {

    // localStorage.setItem('currentQuestion', questionNum);

    localStorage.setItem('qid' + questionNum, selectedOption);

    if (questionObj.options.correctOption == 'option' + selectedOption) {
        correctedProgress.push('qid' + questionNum);
        // no need to store in local storage acutally
        // localStorage.setItem('correctedProgress',JSON.stringify(correctedProgress));
    }
    else {
        if (correctedProgress.includes('qid' + questionNum)) {
            correctedProgress.pop('qid' + questionNum);
            // localStorage.setItem('correctedProgress',JSON.stringify(correctedProgress));
        }
    }
}

// // Load the saved progress from localStorage
// function loadProgress() {
//     let currentQuestion = localStorage.getItem('currentQuestion') || 1;
//     let selectedOption = localStorage.getItem('qid' + currentQuestion);

//     // Set the question and option based on saved data
//     // Set the radio button to the saved option if available
//     if (selectedOption) {
//         document.querySelector(`input[value="${selectedOption}"]`).checked = true;
//     }

//     return currentQuestion;
// }

// When the user selects an option, save the progress
document.querySelectorAll('input[name="option"]').forEach(function (radioButton) {
    radioButton.addEventListener('change', function () {
        let selectedOption = this.value;
        // let currentQuestion = document.getElementById('qn number').value;
        let currentQuestion = questionCounter;
        saveProgress(currentQuestion, selectedOption);
    });
});


<<<<<<< HEAD



// Call loadProgress when the page loads
window.onload = function () {
    let questionNum = loadProgress();
    // Load and display the question based on questionNum
};
=======
// // Call loadProgress when the page loads
// window.onload = function () {
//     let questionNum = loadProgress();
//     // Load and display the question based on questionNum
// };
>>>>>>> 29ed5b360f1aad7928d1db75cf25020f8f47eba6


//make submit button visible when user gets pass 80 questions
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('examForm');
    const submitBtn = document.getElementById('submitBtn');

    // Add event listener for all input fields in the form
    form.addEventListener('input', function () {
        const answered = countAnsweredQuestions();
        if (answered >= 80) {
            // Show the submit button when 80 questions are answered
            submitBtn.style.display = 'block';
        } else {
            // Hide the submit button if less than 80 questions are answered
            submitBtn.style.display = 'none';
        }
    });
});

<<<<<<< HEAD
// making the attempted questions work 
let attemptedQuestions = 0;
const nextButton = document.getElementById('next');
const attemptedCountDisplay = document.getElementById('attempted-count');
const exampage = document.getElementById('question-form');

// Event listener for the "Next" button
nextButton.addEventListener('click', function () {
    // Check if one of the radio buttons is selected
    const selectedOption = exampage.querySelector('input[type="radio"]:checked');

    if (selectedOption) {
        attemptedQuestions++;  // Increment attempted question count
        attemptedCountDisplay.textContent = attemptedQuestions; // Update the display

        // Clear the selected option for the next question
        exampage.reset();

    }
});
=======

// auto submit
setTimeout(sendMarks,.5 * 60 * 60 * 1000);

let submitStr = document.getElementById('next').textContent;
        if (submitStr !== "Submit"){
    window.onbeforeunload = function () {
        return "Data will be lost if you leave the page, are you sure?";
    };
}
>>>>>>> 29ed5b360f1aad7928d1db75cf25020f8f47eba6
