<textarea id="{{ $input->field->handle }}" name="{{ $input->field->handle }}" class="{{ implode(' ', $input->classes) }}"
    rows="10">{{ $input->field->value }}</textarea>

<link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
<script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>

<script>
    (function (window, document) {
        var editor = new EasyMDE({
            element: document.getElementById("{{ $input->field->handle }}")
        });
    })(window, document);
</script>