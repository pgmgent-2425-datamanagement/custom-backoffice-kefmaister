<h1 class="text-center text-2xl font-bold mb-4">Home Dashboard</h1>
<div class="flex flex-wrap justify-center gap-4">
    <div class="w-1/2 md:w-1/3 lg:w-1/4">
        <canvas id="userChart" class="w-full h-auto"></canvas>
    </div>
    <div class="w-1/2 md:w-1/3 lg:w-1/4">
        <canvas id="playlistChart" class="w-full h-auto"></canvas>
    </div>
</div>
<!-- Correct link to your JS file -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="/script/homeCharts.js"></script>
<script>
    // Pass data to JS (assuming these variables are set in PHP)
    window.userCount = <?= $userCount ?>;
    window.playlistCount = <?= $playlistCount ?>;
</script>
