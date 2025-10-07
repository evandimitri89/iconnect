@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>Edit Schedule</h2>
    <form action="{{ route('schedules.update', $schedule) }}" method="POST">
      @csrf @method('PUT')
      <div class="mb-3">
        <label class="form-label">Subject</label>
        <input type="text" name="subject" value="{{ $schedule->subject }}" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Type</label>
        <input type="text" name="type" value="{{ $schedule->type }}" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ $schedule->description }}</textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select" required>
          <option {{ $schedule->status == 'Pending' ? 'selected' : '' }}>Pending</option>
          <option {{ $schedule->status == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
          <option {{ $schedule->status == 'Done' ? 'selected' : '' }}>Done</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Deadline</label>
        <input type="date" name="deadline" value="{{ $schedule->deadline }}" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
      <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
@endsection
