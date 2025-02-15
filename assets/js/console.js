document.getElementById('code').addEventListener('keydown', (e) => {
    let textarea = e.target;
    let lines = textarea.value.split("\n");
    let lastLine = lines[lines.length - 1];

    if (e.key === 'Enter') {
        e.preventDefault();
        lines.push(lastLine.startsWith("    ") ? "    " : "" );
    }

    if (e.key === 'Tab') {
        e.preventDefault();
        if (e.shiftKey) lines[lines.length - 1] = lastLine.startsWith("    ") ? lastLine.slice(4) : lastLine;
        if (!lastLine.startsWith("    ")) lines[lines.length - 1] = "    " + lastLine;
    }

    textarea.value = lines.join("\n");
});

function runPHP() {
    let code = document.getElementById('code').value;
    let consoleDiv = document.getElementById('console');
    
    fetch('/files/sandbox/run.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'code=' + encodeURIComponent(code)
    })
    .then(response => response.text())
    .then(data => {
        consoleDiv.innerHTML = '> ' + data.replace(/\n/g, '<br>');
    })
    .catch(error => consoleDiv.innerHTML = '> Erreur: ' + error);
}
