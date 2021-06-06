<div>
    <input type="text" class="" wire:model="name">
    <input type="checkbox" wire:model="loud">
    <select wire:model="greet" multiple>
        <option value="">hello</option>
        <option value="">goodbye</option>
        <option value="">adios</option>
        <option value="">see you</option>
    </select>
<div wire:poll.750ms>
        Current time: {{ now() }}
    </div>
<div wire:offline.class.remove="bg-green-300" class="bg-green-300"> hello</div>
    {{implode(', ', $greet)}} {{$name}} @if ($loud) ! @endif
    <button wire:mouseenter='resetName'>Reset name </button>
</div>
