<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <title>Examination</title>

    <!-- <style>
        .right__block {
            background-color: #dbe6e6 !important;
            width: 330px;
            margin: 20px 30px 0;

        }

        .options__items {
            height: 15px;
            width: 15px background-color: blue;
        }

        .ans__number {
            list-style: none;
            background-color: #eee;
            color: teal;
            margin: 3px;
            padding: 2px;
            /* height: 20px; */
            border: none;
            text-align: center;
        }

        /* .containerlist {
            display: grid;
            grid-template-columns: repeat(10, 1fr);
            grid-template-rows: repeat(10, 1fr);
            border: 1px solid black;
        } */
    </style> -->

</head>

<body>
    <!-- title bar -->
    <div class="d-flex p-2 justify-content-center align-items-center" style="background-color: #002561;">
        <p class="fs-1 fw-medium text-light">Adarsha Saula Yubak Secondary School</p>
    </div>

    <!-- action bar -->
    <div class="d-flex justify-content-between p-2" style="background-color: white; margin-bottom: calc(10vh);">
        <!-- logo -->
        <img src="images/adarshaLogo.png" style="height: 70px;" alt="">
        <!-- question number -->
        <p class="align-self-center fs-5" id="qnIndicator"></p>
        <!-- timer -->
        <p class="align-self-center fs-5" id="timer">Timer:
            <small id="hours">

            </small>:
            <small id="minutes">

            </small>:
            <small id="seconds">

            </small>
        </p>
        <div class="qst_status">
            <ul  class="student-progress">
                <li class="student-attempt">Attempted :<span id="attempted-count">0
                        / 100</span></li>
                <li class="student-mark">Unanswered :<span >0</span></li>
            </ul>
        </div>
        <!-- buttons -->
        <div class="align-self-center">
            <button class="btn btn-primary m-3 fs-6" id="prev" style="width: 200px;">Previous</button>
            <button class="btn btn-primary m-3 fs-6" id="next" style="width: 200px;">Next</button>
        </div>
    </div>

    <!-- add correct option -->
    <div class="container d-none" id="question-container">
        {
        "Question 1":{
        "Qn": "How many seconds are present in a day?",
        "options":{
        "option1": "86400",
        "option2": "83239",
        "option3": "64000",
        "option4": "55555",
        "correctOption": "option1"
        }
        },
        "Question 2":{
        "Qn": "which planet is closest to the sun?",
        "options":{
        "option1": "Mercury",
        "option2": "Venus",
        "option3": "Mars",
        "option4": "Uranus",
        "correctOption": "option1"
        }
        },
        "Question 3":{
        "Qn": "which planet is c to the earth?",
        "options":{
        "option1": "Mercury#$",
        "option2": "Ves",
        "option3": "Mars",
        "option4": "Uranus"
        }
        },
        "Question 4":{
        "Qn": "which planet is closest to t",
        "options":{
        "option1": "Mercury#$",
        "option2": "Venus",
        "option3": "Mars",
        "option4": "Uranus"
        }
        },
        "Question 5":{
        "Qn": "which planet ishe earth?",
        "options":{
        "option1": "Mercury#$",
        "option2": "Vnus",
        "option3": "Mars",
        "option4": "Uranus"
        }
        },
        "Question 6":{
        "Qn": "w is closest to the earth?",
        "options":{
        "option1": "Mercury#$",
        "option2": "Veus",
        "option3": "Ms",
        "option4": "Uranus"
        }
        },
        "Question 7":{
        "Qn": "which planeto the earth?",
        "options":{
        "option1": "Mercury#$",
        "option2": "Venus",
        "option3": "Mars",
        "option4": "Uranus"
        }
        },
        "Question 8":{
        "Qn": "which planet is closest trth?",
        "options":{
        "option1": "Mercury#$",
        "option2": "Vnus",
        "option3": "Mars",
        "option4": "Uanus"
        }
        },
        "Question 9":{
        "Qn": "which plosest to the earth?",
        "options":{
        "option1": "Mercury#$",
        "option2": "Vnus",
        "option3": "Mrs",
        "option4": "Uranus"
        }
        },
        "Question 10":{
        "Qn": "which planet is  earth?",
        "options":{
        "option1": "Mercury#$",
        "option2": "Venus",
        "option3": "Mars",
        "option4": "Uranus"
        }
        }
        }
        <!-- php code to fetch the -->
        <!-- json format must be used! -->
        <!--          
         Note that right option must be labelled with #$ at the end. This process must be done when storing answers in database which is done using the code "not manually"
        
          -->
    </div>

    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center h-50">
        <!----------------------- Question Container -------------------------->
        <div class="row border rounded-5 p-2 bg-white shadow box-area" id="question-form">
            <!--------------------------- Left Box (question) ----------------------------->
            <div class="col right-box">
                <div class="row align-items-center">
                    <div class="header-text" id="questionBox">
                        <h2 id="qn number" value="5">Question (number)</h2>
                        <p id="question">sdfsdfsdfsd</p>
                    </div>
                </div>
            </div>
            <div class="col-auto g-1 rounded-5" style="background-color: green;"></div>
            <!-------------------- ------ Right Box (Options) ---------------------------->
            <div class="col right-box">
                <div class="header-text mb-2">
                    <h2>Answer</h2>
                    <!-- <input type="checkbox" class="btn-check" id="btn-check-2" autocomplete="off"> -->
                    <!-- < (not planned) label class="btn btn-outline-secondary" for="btn-check-2">Mark for Review</label> -->

                </div>
                <!-- options -->
                <!-- <form action="processRadio.php" method="POST"> -->
                <div class="ps-3 pb-5">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="option" id="Option1" value="1">
                        <label class="form-check-label options" for="Option1"></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="option" id="Option2" value="2">
                        <label class="form-check-label options" for="Option2"></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="option" id="Option3" value="3">
                        <label class="form-check-label options" for="Option3"></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="option" id="Option4" value="4">
                        <label class="form-check-label options" for="Option4"></label>
                    </div>

                </div>
                <!-- </form> -->
            </div>
        </div>
        <!-- <button class="btn btn-primary m-3 fs-18" id="next" style="width: 200px;">Submit</button> -->
    </div>
    <!-- index page -->
    <!-- <div class="right__block">
        <div class="right__wrapper">
            <div class="font-20 mt-4 mb-5 text-center">Index</div>
            <div class="">
                <div class="row">
                    <div class="col-sm-12 col-md-6 d-flex align-items-center">
                        <div class="square mr-2" style="background-color: green; width: 20px; height: 20px;"></div>
                        Answered
                    </div>
                    <div class="col-sm-12 col-md-6 d-flex align-items-center">
                        <div class="square mr-2" style="background-color: grey; width: 20px; height: 20px;"></div>
                        Unanswered
                    </div>
                    <div _ngcontent-fak-c68="" class="ans__number">
                        <div _ngcontent-fak-c68="" class="div-answer-sheet">
                            <div class="containerlist">
                                <div class="row">
                                    <div class="col-1">1</div>
                                    <div class="col-1">2</div>
                                    <div class="col-1">3</div>
                                    <div class="col-1">4</div>
                                    <div class="col-1">5</div>
                                    <div class="col-1">6</div>
                                    <div class="col-1">7</div>
                                    <div class="col-1">8</div>
                                    <div class="col-1">9</div>
                                    <div class="col-1">10</div>
                                </div>
                                <div class="row">
                                    <div class="col-1">11</div>
                                    <div class="col-1">12</div>
                                    <div class="col-1">13</div>
                                    <div class="col-1">14</div>
                                    <div class="col-1">15</div>
                                    <div class="col-1">16</div>
                                    <div class="col-1">17</div>
                                    <div class="col-1">18</div>
                                    <div class="col-1">19</div>
                                    <div class="col-1">20</div>
                                </div>
                                <div class="row">
                                    <div class="col-1">21</div>
                                    <div class="col-1">22</div>
                                    <div class="col-1">23</div>
                                    <div class="col-1">24</div>
                                    <div class="col-1">25</div>
                                    <div class="col-1">26</div>
                                    <div class="col-1">27</div>
                                    <div class="col-1">28</div>
                                    <div class="col-1">29</div>
                                    <div class="col-1">30</div>
                                </div>
                                <div class="row">
                                    <div class="col-1">41</div>
                                    <div class="col-1">42</div>
                                    <div class="col-1">43</div>
                                    <div class="col-1">44</div>
                                    <div class="col-1">45</div>
                                    <div class="col-1">46</div>
                                    <div class="col-1">47</div>
                                    <div class="col-1">48</div>
                                    <div class="col-1">49</div>
                                    <div class="col-1">50</div>
                                </div>
                                <div class="row">
                                    <div class="col-1">51</div>
                                    <div class="col-1">52</div>
                                    <div class="col-1">53</div>
                                    <div class="col-1">54</div>
                                    <div class="col-1">55</div>
                                    <div class="col-1">56</div>
                                    <div class="col-1">57</div>
                                    <div class="col-1">58</div>
                                    <div class="col-1">59</div>
                                    <div class="col-1">60</div>
                                </div>
                                <div class="row">
                                    <div class="col-1">61</div>
                                    <div class="col-1">62</div>
                                    <div class="col-1">63</div>
                                    <div class="col-1">64</div>
                                    <div class="col-1">65</div>
                                    <div class="col-1">66</div>
                                    <div class="col-1">67</div>
                                    <div class="col-1">68</div>
                                    <div class="col-1">69</div>
                                    <div class="col-1">70</div>
                                </div>
                                <div class="row">
                                    <div class="col-1">71</div>
                                    <div class="col-1">27</div>
                                    <div class="col-1">73</div>
                                    <div class="col-1">74</div>
                                    <div class="col-1">75</div>
                                    <div class="col-1">76</div>
                                    <div class="col-1">77</div>
                                    <div class="col-1">78</div>
                                    <div class="col-1">79</div>
                                    <div class="col-1">80</div>
                                </div>
                                <div class="row">
                                    <div class="col-1">81</div>
                                    <div class="col-1">82</div>
                                    <div class="col-1">83</div>
                                    <div class="col-1">84</div>
                                    <div class="col-1">85</div>
                                    <div class="col-1">86</div>
                                    <div class="col-1">87</div>
                                    <div class="col-1">88</div>
                                    <div class="col-1">89</div>
                                    <div class="col-1">90</div>
                                </div>
                                <div class="row">
                                    <div class="col-1">91</div>
                                    <div class="col-1">92</div>
                                    <div class="col-1">93</div>
                                    <div class="col-1">94</div>
                                    <div class="col-1">95</div>
                                    <div class="col-1">96</div>
                                    <div class="col-1">97</div>
                                    <div class="col-1">98</div>
                                    <div class="col-1">99</div>
                                    <div class="col-1">100</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> -->
    </div>
  </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/exam.js"></script>
</body>

</html>