<div class="alert alert-danger" role="alert" id="message">
    A simple danger alert—check it out!
    <button type="button" class="btn-close" aria-label="Close"></button>
</div>
<script>
    setTimeout(function() {
        document.querySelector('#message').remove();
    }, 5000);
</script>
