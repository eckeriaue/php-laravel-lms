
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/js/app.js'])
</head>
<body>
<div x-data="{ expanded: false }">
        <button type="button"  @click="expanded = ! expanded">
            <span x-show="! expanded">Show post content...</span>
            <span x-show="expanded">Hide post content...</span>
        </button>
 
    </div>
    <a href="/login"> to login </a>
</body>
</html>