 @props(['label', 'name', 'type' => 'text', 'value' => '', 'attributes' => [], 'placeholder' => '', 'required' => false])
 
 <div class="space-y-2">
        <label for="{{ $name }}" class="label">{{ $label }}</label>
        <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name) }}" placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }} class="input" {{ $attributes }}>

        @error($name)
            <p class="error">{{ $message }}</p>
        @enderror
        
  </div>