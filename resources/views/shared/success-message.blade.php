<div class="row" id="message">
<div class="alert alert-success" role="alert">
     {{session('success')}}
    <button type="button" class="btn-close" aria-label="Close"></button>
</div>
</div>


<script>
setTimeout(function() {
    document.querySelector('#message').remove();
}, 5000);
</script>
