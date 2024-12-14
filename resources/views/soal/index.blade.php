<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal {{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .button-transition {
            transition: all 0.3s ease-in-out;
        }
        .button-transition:hover {
            transform: scale(1.05);
        }
        .button-transition:active {
            transform: scale(0.98);
        }
        .correct {
            color: #16a34a;
            font-weight: bold;
        }
        .incorrect {
            color: #dc2626;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-teal-500 via-green-400 to-blue-500">
    <main class="bg-gradient-to-b from-gray-50 to-green-100 py-8 min-h-screen flex flex-col justify-center">
        <div class="flex items-center justify-center">
            <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-lg">
                <h1 class="text-4xl font-bold text-center text-gray-800 mb-6">Soal {{ $title }}</h1>
                <div id="question" class="text-lg font-medium text-gray-700 mb-6 text-center">
                    Loading question...
                </div>
                <div id="options" class="flex flex-col gap-4"></div>
                <div class="flex justify-between mt-6">
                    <button id="prev-btn" class="bg-gray-500 text-white py-3 px-6 rounded-full button-transition disabled:bg-gray-300 disabled:cursor-not-allowed">
                        Previous
                    </button>
                    <button id="next-btn" class="bg-blue-500 text-white py-3 px-6 rounded-full button-transition disabled:bg-gray-300 disabled:cursor-not-allowed">
                        Next
                    </button>
                </div>
                <div id="result" class="hidden text-center">
                    <p id="score" class="text-5xl font-bold mb-6"></p>
                    <p id="result-summary" class="text-lg font-medium text-gray-700 mb-4"></p>
                    <button id="review-btn" class="bg-yellow-500 text-white py-3 px-6 rounded-full button-transition w-full mt-4">
                        Review
                    </button>
                </div>
                <a id="complete-btn" href="/soal" class="hidden mt-6 bg-blue-500 text-white py-3 px-6 rounded-full text-center w-full button-transition">
                    Selesai
                </a>
            </div>
        </div>
    </main>

    <script>
        let currentQuestionIndex = 0;
        let questions = [];
        let answers = [];
        const mataPelajaran = "{{ $mataPelajaran }}";
        const questionElement = document.getElementById('question');
        const optionsElement = document.getElementById('options');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        const resultDiv = document.getElementById('result');
        const resultSummary = document.getElementById('result-summary');
        const scoreElement = document.getElementById('score');
        const completeBtn = document.getElementById('complete-btn');
        const reviewBtn = document.getElementById('review-btn');

        fetch(`/soal/${mataPelajaran}/questions`)
            .then(response => response.json())
            .then(data => {
                questions = data;
                loadQuestion();
                updateNavigationButtons();
            });

        function loadQuestion() {
            const question = questions[currentQuestionIndex];
            questionElement.textContent = question.question;

            optionsElement.innerHTML = '';
            question.options.forEach((option, index) => {
                const button = document.createElement('button');
                button.textContent = option;
                button.className = 'bg-gray-200 py-3 px-6 rounded-lg text-left text-lg font-medium button-transition';
                button.addEventListener('click', () => selectAnswer(index, button));
                if (answers[currentQuestionIndex] === index) {
                    button.classList.add('bg-green-500', 'text-white');
                }
                optionsElement.appendChild(button);
            });

            nextBtn.disabled = !answers[currentQuestionIndex];
        }

        function selectAnswer(selectedIndex, selectedButton) {
            const buttons = optionsElement.querySelectorAll('button');
            buttons.forEach(button => {
                button.classList.remove('bg-green-500', 'text-white');
                button.classList.add('bg-gray-200');
            });

            answers[currentQuestionIndex] = selectedIndex;
            selectedButton.classList.remove('bg-gray-200');
            selectedButton.classList.add('bg-green-500', 'text-white');
            nextBtn.disabled = false;
        }

        function updateNavigationButtons() {
            prevBtn.disabled = currentQuestionIndex === 0;
            nextBtn.textContent = currentQuestionIndex === questions.length - 1 ? 'Finish' : 'Next';
        }

        prevBtn.addEventListener('click', () => {
            if (currentQuestionIndex > 0) {
                currentQuestionIndex--;
                loadQuestion();
                updateNavigationButtons();
            }
        });

        nextBtn.addEventListener('click', () => {
            if (currentQuestionIndex < questions.length - 1) {
                currentQuestionIndex++;
                loadQuestion();
                updateNavigationButtons();
            } else {
                showResults();
            }
        });

        function showResults() {
            let correctCount = 0;
            questions.forEach((question, index) => {
                if (answers[index] === question.correctAnswer) {
                    correctCount++;
                }
            });

            const score = Math.round((correctCount / questions.length) * 100);
            const scoreColor = score >= 70 ? 'text-green-500' : 'text-red-500';

            questionElement.textContent = 'Quiz Completed!';
            optionsElement.innerHTML = '';
            prevBtn.style.display = 'none';
            nextBtn.style.display = 'none';
            resultSummary.textContent = `Benar: ${correctCount}, Salah: ${questions.length - correctCount}`;
            scoreElement.textContent = score;
            scoreElement.classList.add(scoreColor);
            resultDiv.classList.remove('hidden');
        }

        reviewBtn.addEventListener('click', () => {
            questionElement.textContent = 'Review Jawaban Anda:';
            optionsElement.innerHTML = '';

            questions.forEach((question, index) => {
                const questionReview = document.createElement('div');
                questionReview.className = 'mb-6';

                const questionText = document.createElement('p');
                questionText.textContent = `${index + 1}. ${question.question}`;
                questionText.className = 'font-medium text-gray-800';
                questionReview.appendChild(questionText);

                const userAnswer = document.createElement('p');
                userAnswer.textContent = `Jawaban: ${question.options[answers[index]]}`;
                userAnswer.className = answers[index] === question.correctAnswer ? 'correct' : 'incorrect';
                questionReview.appendChild(userAnswer);

                const correctAnswer = document.createElement('p');
                correctAnswer.textContent = `Jawaban benar: ${question.options[question.correctAnswer]}`;
                correctAnswer.className = 'correct';
                questionReview.appendChild(correctAnswer);

                optionsElement.appendChild(questionReview);
            });

            reviewBtn.style.display = 'none';
            completeBtn.classList.remove('hidden');
        });
    </script>
</body>
</html>