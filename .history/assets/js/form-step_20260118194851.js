let currentStep = 1;

function startJourney() {
    document.getElementById('landing-page').style.display = 'none';
    document.getElementById('form-container').style.display = 'block';
    showStep(1);
}

function showStep(step) {
    document.querySelectorAll('.step-content').forEach(s =>
        s.classList.remove('active')
    );

    const target = document.getElementById(`step-${step}`);
    if (target) {
        target.classList.add('active');
        currentStep = step;
        updateProgress(step);
    }
}

function validateAndNext(from, to) {
    let valid = true;
    const inputs = document.querySelectorAll(`#step-${from} [required]`);

    inputs.forEach(input => {
        if (!input.value.trim()) {
            input.classList.add('error');
            valid = false;
        } else {
            input.classList.remove('error');
        }
    });

    if (!valid) return;
    showStep(to);
}

function goToStep(step) {
    showStep(step);
}

function updateProgress(step) {
    document.querySelectorAll('.progress-bar').forEach((bar, i) => {
        bar.classList.toggle('active', i < step);
    });
}

document.addEventListener('DOMContentLoaded', () => {
    showStep(1);
});
