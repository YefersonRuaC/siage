<div id="mensaje" class="flex justify-center text-lg items-center gap-1 text-green-700 font-bold rounded-lg border-b-4 border-green-600 space-y-1 bg-green-100 py-2 px-4 mx-2 mb-3">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-auto">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
    </svg>  
    {{ session('mensaje') }}
</div> 
<script>
    setTimeout(() => {
        document.getElementById('mensaje').style.display = 'none';
    }, 5000)
</script>