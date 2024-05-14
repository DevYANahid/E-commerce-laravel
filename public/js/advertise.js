$(function () {
    var addTypesBtn = document.getElementsByClassName('select_add');
    for (var i = 0; i < addTypesBtn.length; i++){
        var button = addTypesBtn[i];
        button.addEventListener('change',advertiseInput);
    }

    function advertiseInput(event) {
        var allInput = document.getElementsByClassName('form-group');
        for (var i = 0; i < allInput.length; i++){
            allInput[i].innerHTML = '';
        }
        // console.log(allInput);

        var selectAdvartise = event.target;
        var inputId = selectAdvartise.getAttribute('id');
        var inputValue = document.getElementById(inputId).value;
        if (inputValue == 'image')
        {
            var addInput = selectAdvartise.parentElement.getElementsByClassName('form-group')[0];
            var inputImage = '<div class="input-advertise-image" id="advertise_image"></div>\n' +
                '<input type="hidden" name="name" value="'+ inputId +'">\n' +
                '<button type="submit" class="btn btn-primary mt-3">Save</button>'
            addInput.innerHTML = inputImage;
            $('.input-advertise-image').imageUploader({
                imagesInputName: 'advertise_image',
                maxFiles: 1
            });

        }else if(inputValue == 'embed'){
            var addInput = selectAdvartise.parentElement.getElementsByClassName('form-group')[0];
            if (inputId != 'add3') {
                var inputCode = '<small class="font-weight-bold">Content should be 300x400</small>\n'+
                    '<textarea class="form-control" name="embed_code" rows="2" placeholder="Embed your code"></textarea>\n' +
                    '<input type="hidden" name="name" value="' + inputId + '">\n' +
                    '<button type="submit" class="btn btn-primary mt-3">Save</button>';
            }else {
                var inputCode = '<small class="font-weight-bold">Content should be 960x180</small>\n'+
                    '<textarea class="form-control" name="embed_code" rows="2" placeholder="Embed your code"></textarea>\n' +
                '<input type="hidden" name="name" value="' + inputId + '">\n' +
                '<button type="submit" class="btn btn-primary mt-3">Save</button>';
            }
                addInput.innerHTML = inputCode;
        }
    }
});
