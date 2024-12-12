<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal MTK</title>
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
    </style>
</head>
<body class="bg-gradient-to-r from-green-400 to-green-500">
    <main class="bg-gradient-to-b from-green-100 to-gray-50 py-16">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-8 rounded-lg shadow-lg w-96 max-w-lg">
                <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Soal MTK</h1>
                <div id="question" class="text-lg font-medium text-gray-700 mb-6">Loading question...</div>
                <div id="options" class="flex flex-col gap-4"></div>
                <button id="next-btn" class="mt-6 bg-blue-500 text-white py-2 px-6 rounded-full disabled:bg-gray-400 disabled:cursor-not-allowed transition-all hover:bg-blue-600">Next</button>
                <div id="result" class="hidden text-center mt-6">
                    <p id="result-summary" class="text-lg font-medium text-gray-700 mb-4"></p>
                    <button id="review-btn" class="bg-yellow-500 text-white py-2 px-6 rounded-full transition-all hover:bg-yellow-600">Review</button>
                </div>
                <a id="complete-btn" href="/soal" class="hidden mt-6 bg-green-500 text-white py-2 px-6 rounded-full text-center transition-all hover:bg-green-600">Selesai</a>
            </div>
        </div>
    </main>

    <script>
        let currentQuestionIndex = 0;
        let questions = [];
        let answers = []; // Store selected answers
        let correctCount = 0;
        const questionElement = document.getElementById('question');
        const optionsElement = document.getElementById('options');
        const nextBtn = document.getElementById('next-btn');
        const resultDiv = document.getElementById('result');
        const resultSummary = document.getElementById('result-summary');
        const reviewBtn = document.getElementById('review-btn');
        const completeBtn = document.getElementById('complete-btn');

        // Fetch questions from the server
        fetch('/soal-mtk/questions')
            .then(response => response.json())
            .then(data => {
                questions = data;
                loadQuestion();
            });

        function loadQuestion() {
            const question = questions[currentQuestionIndex];
            questionElement.textContent = question.question;

            // Load options
            optionsElement.innerHTML = '';
            question.options.forEach((option, index) => {
                const button = document.createElement('button');
                button.textContent = option;
                button.className = 'bg-gray-200 hover:bg-gray-300 py-3 px-6 rounded-lg text-left text-lg font-medium button-transition';
                button.addEventListener('click', () => selectAnswer(index, button));
                optionsElement.appendChild(button);
            });

            nextBtn.disabled = true;
        }

        function selectAnswer(selectedIndex, selectedButton) {
            // Remove selection from all buttons
            const buttons = optionsElement.querySelectorAll('button');
            buttons.forEach(button => {
                button.classList.remove('bg-green-500', 'text-white');
                button.classList.add('bg-gray-200', 'hover:bg-gray-300');
            });

            // Apply green style to the selected button
            answers[currentQuestionIndex] = selectedIndex; // Store the answer
            selectedButton.classList.remove('bg-gray-200', 'hover:bg-gray-300');
            selectedButton.classList.add('bg-green-500', 'text-white');

            nextBtn.disabled = false;
        }

        nextBtn.addEventListener('click', () => {
            currentQuestionIndex++;
            if (currentQuestionIndex < questions.length) {
                loadQuestion();
            } else {
                showResults();
            }
        });

        function showResults() {
            correctCount = 0;
            const incorrectCount = questions.length;

            // Calculate correct answers
            questions.forEach((question, index) => {
                if (answers[index] === question.correctAnswer) {
                    correctCount++;
                }
            });

            questionElement.textContent = 'Quiz completed!';
            optionsElement.innerHTML = '';
            nextBtn.style.display = 'none';

            resultSummary.textContent = `Benar: ${correctCount}, Salah: ${questions.length - correctCount}`;
            resultDiv.classList.remove('hidden');
        }

        reviewBtn.addEventListener('click', () => {
            let reviewContent = '';
            questions.forEach((question, index) => {
                const userAnswer = answers[index];
                const correctAnswer = question.correctAnswer;
                reviewContent += `
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">${question.question}</h3>
                        <p class="text-sm ${userAnswer === correctAnswer ? 'text-green-600' : 'text-red-600'}">Jawaban Anda: ${question.options[userAnswer] || 'Tidak dijawab'}</p>
                        <p class="text-sm text-gray-600">Jawaban Benar: ${question.options[correctAnswer]}</p>
                    </div>
                `;
            });

            optionsElement.innerHTML = reviewContent;
            resultDiv.style.display = 'none';
            completeBtn.classList.remove('hidden');
        });
    </script>
</body>
</html>