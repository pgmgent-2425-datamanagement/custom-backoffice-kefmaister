<h1 class="text-center text-2xl font-bold mb-4">Home Dashboard</h1>
<div class="flex flex-wrap justify-center gap-4">
    <div class="w-1/2 md:w-1/3 lg:w-1/4">
    <canvas id="countryChart" class="w-full h-auto"></canvas>    
</div>
    <div class="w-1/2 md:w-1/3 lg:w-1/4">
        <canvas id="playlistChart" class="w-full h-auto"></canvas>
    </div>
</div>
<!-- Correct link to your JS file -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="/script/homeCharts.js?v=<?php if( $_ENV['DEV_MODE'] == "true" ) { echo time(); }; ?>"></script>
<script>
    // Pass data to JS (assuming these variables are set in PHP)
    window.countryNames = <?= json_encode($countries) ?>;
        window.userCounts = <?= json_encode($userCounts) ?>;
        window.playlistCount = <?= json_encode($playlistCount) ?>;
</script>
