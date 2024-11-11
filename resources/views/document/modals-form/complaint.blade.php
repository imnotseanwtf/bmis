<div class="form-group mt-3">
    <label for="complainant">Complainant</label>
    <input type="text" class="form-control" name="complainant" placeholder="Enter complainant's name"
        value="{{ old('complainant') }}" required>
    @error('complainant')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    <label for="against">Against</label>
    <input type="text" class="form-control" name="against" placeholder="Enter the party being complained against"
        value="{{ old('against') }}" required>
    @error('against')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    <label for="respondents">Respondents</label>
    <input type="text" class="form-control" name="respondents" placeholder="Enter respondents"
        value="{{ old('respondents') }}" required>
    @error('respondents')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
