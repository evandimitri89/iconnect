@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>Add Schedule</h2>
    <form action="{{ route('schedules.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label">Subject</label>
        <input type="text" name="subject" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Type</label>
        <input type="text" name="type" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control"></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select" required>
          <option value="Pending">Pending</option>
          <option value="Ongoing">Ongoing</option>
          <option value="Done">Done</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Deadline</label>
        <input type="date" name="deadline" class="form-control">
      </div>
      <button type="submit" class="btn btn-success">Save</button>
      <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
@endsection
