<x-window title="sdfsd">

    <div x-data="{ expanded: false }">
        <button type="button"  @click="expanded = ! expanded">
            <span x-show="! expanded">Show post content...</span>
            <span x-show="expanded">Hide post content...</span>
        </button>
    </div>
    <a href="/login"> to login </a>

</x-window>