<div class="row">
    @forelse($projects as $project)
        <div class="col-lg-4 col-sm-6 mt-3">
            <div class="card client text-center">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text">
                    @if($project->accepted)
                        <div class="text-success">Project Accepted on {{ $project->accepted_at->toFormattedDateString() }}</div>
                    @else
                        <div class="text-danger">Project Not Accepted Yet</div>
                    @endif
                    <div>Project Invoices: {{ $project->invoices->count() }}</div>
                    </p>
                    @if(Auth::user()->isAdmin())
                        <a href="/clients/{{ $client->id }}/projects/{{ $project->id}}/"
                           title="{{ $project->title }}" class="btn btn-primary">View Project</a>
                    @else
                        <a href="/projects/{{ $project->id}}/" title="{{ $project->title }}" class="btn btn-primary">View Project</a>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 mt-3">
                <p>There are currently no projects.</p>
            </div>
    @endforelse
</div>