<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eSignature Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        canvas {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            cursor: crosshair;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        #signatureDisplay {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f0f0f0;
            font-style: italic;
            font-weight: bold;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>eSignature Generator</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <br>
        <canvas id="signatureCanvas" width="400" height="200"></canvas>
        <br>
        <button onclick="clearCanvas()">Clear</button>
        <button onclick="downloadImage()">Download Image</button>
        <button onclick="downloadPDF()">Download PDF</button>
        <div id="signatureDisplay"></div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
    <script>
        const canvas = document.getElementById('signatureCanvas');
        const signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgba(255, 255, 255, 0.5)'
        });

        function clearCanvas() {
            signaturePad.clear();
        }

        function downloadImage() {
            const dataURL = signaturePad.toDataURL();
            const a = document.createElement('a');
            a.href = dataURL;
            a.download = 'signature.png';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }

        function downloadPDF() {
            const dataURL = signaturePad.toDataURL();
            const pdf = new jsPDF();
            pdf.addImage(dataURL, 'PNG', 0, 0);
            pdf.save('signature.pdf');
        }

        document.getElementById('name').addEventListener('input', suggestSignature);

        function suggestSignature() {
            const name = document.getElementById('name').value;
            // Generate styled signature based on the input name
            const suggestedSignature = `
                <span style="font-size: 24px;">&#10072;</span>
                <span style="font-family: cursive;">${name}</span>
                <span style="font-size: 24px;">&#10072;</span>`;
            // Display suggested signature in a div
            document.getElementById('signatureDisplay').innerHTML = suggestedSignature;
        }
    </script>
</body>
</html>
