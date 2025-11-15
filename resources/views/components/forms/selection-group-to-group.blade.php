@props(['items', 'item', 'name'])
<div class="mb-3">
    <label class="form-label required">Menu</label>
    <select class="form-select @error($name) is-invalid @enderror" name="{{ $name }}">
        <option value="">Pilih</option>
        @foreach ($items as $menu)
            @if (!$menu->dropdown)
                <option value="menu-{{ $menu->id }}" @selected('menu-' . $menu->id == old($name, $item))>
                    {{ $menu->nama }}
                </option>
            @else
                <optgroup label="> {{ $menu->nama }}">
                    @foreach ($menu->listSubMenu as $submenu)
                        @if (!$submenu->dropdown)
                            <option value="submenu-{{ $submenu->id }}" @selected('submenu-' . $submenu->id == old($name, $item))>
                                {{ $submenu->nama }}
                            </option>
                        @else
                <optgroup label=">> {{ $submenu->nama }}">
                    @foreach ($submenu->listChildrenSubmenu as $children_submenu)
                        <option value="children_submenu-{{ $children_submenu->id }}" @selected('children_submenu-' . $children_submenu->id == old($name, $item))>
                            {{ $children_submenu->nama }}
                        </option>
                    @endforeach
                </optgroup>
            @endif
        @endforeach
        </optgroup>
        @endif
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
