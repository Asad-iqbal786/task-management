  <div class="modal fade" id="bs-example-modal-lg-{{ $task['id'] }}" tabindex="-1" role="dialog"
      aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="myLargeModalLabel">{{ $task['title'] }}</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <h5 class="mb-3">Task Information</h5>
                  <dl class="row">
                      <dt class="col-sm-4">Task ID:</dt>
                      <dd class="col-sm-8">{{ $task['id'] }}</dd>

                      <dt class="col-sm-4">User Name:</dt>
                      <dd class="col-sm-8">{{ $task['user']['name'] }}</dd>

                      <dt class="col-sm-4">Title:</dt>
                      <dd class="col-sm-8">{{ $task['title'] }}</dd>

                      <dt class="col-sm-4">Description:</dt>
                      <dd class="col-sm-8">{{ $task['description'] }}</dd>

                      <dt class="col-sm-4">Completed:</dt>
                      <dd class="col-sm-8">
                          @if ($task['is_completed'] === 'yes')
                              <span class="badge bg-success">Yes</span>
                          @else
                              <span class="badge bg-warning text-dark">No</span>
                          @endif
                      </dd>
                      @if ($task['is_completed'] != 'yes')
                          <!-- Inside your modal body -->
                          <form action="{{ route('userTaskStatusUpdate', $task->id) }}" method="POST">
                              @csrf
                              <div class="mb-3">
                                  <label for="is_completed" class="form-label">Mark as Completed</label>
                                  <select name="is_completed" id="is_completed" class="form-select">
                                      <option value="no" {{ $task->is_completed === 'no' ? 'selected' : '' }}>No
                                      </option>
                                      <option value="yes" {{ $task->is_completed === 'yes' ? 'selected' : '' }}>Yes
                                      </option>
                                  </select>
                              </div>
                              <button type="submit" class="btn btn-primary">Update Status</button>
                          </form>
                      @endif

                      @foreach ($task['completeStatus'] as $status)
                          @if ($status['is_completed'] === 'yes')
                              <dt class="col-sm-4">Completed Date:</dt>
                          @else
                              <dt class="col-sm-4">Assigned Date:</dt>
                          @endif
                          <dd class="col-sm-8">
                              {{ \Carbon\Carbon::parse($status['created_at'])->format('d M Y, h:i A') }}
                          </dd>
                      @endforeach

                  </dl>
              </div>
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
