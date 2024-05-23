let pictureIndex = 1;

document.getElementById('addPicture').addEventListener('click', function () {
    const container = document.getElementById('pictures-container');

    const pictureDiv = document.createElement('div');
    pictureDiv.className = 'picture-input';

    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.name = `pictures[${pictureIndex}][image]`;
    fileInput.required = true;

    const textInput = document.createElement('input');
    textInput.type = 'text';
    textInput.name = `pictures[${pictureIndex}][name]`;
    textInput.placeholder = 'Picture Name';
    textInput.required = true;

    pictureDiv.appendChild(fileInput);
    pictureDiv.appendChild(textInput);

    container.appendChild(pictureDiv);

    pictureIndex++;
});
