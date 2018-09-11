
  <div class="sidebar-module sidebar-module-inset">
    <h4>About</h4>
    <p>I'm learning Laravel. It's pretty, pretty good. </p>
  </div>

  <div class="sidebar-module">
    <h4>Add a Blog Post</h4>
    <ol class="list-unstyled">
      <li>
        <a href="/blog/create">Yes, Please</a>
      </li>
    </ol>
  </div>

  <div class="sidebar-module">
    <h4>Add a Task</h4>
    <ol class="list-unstyled">
      <a href="/tasks/create">Righty-o, Chap</a>
    </ol>
  </div>

  <div class="sidebar-module">
    <h4>The Grand Archives</h4>
    <ol class="list-unstyled">
      @foreach ($archives as $period)
        <li>
          <a href="/blog/?month={{ $period['month'] }}&year={{ $period['year'] }}">
            {{ $period['month'] }} {{ $period['year'] }}
          </a>
        </li>
      @endforeach
    </ol>
  </div>

  <div class="sidebar-module">
    <h4>Tag, You're It</h4>
    <ol class="list-unstyled">
      @foreach ($tags as $tag)
        <li>
          <a href="/blog/tags/{{ $tag }}">
            {{ $tag }}
          </a>
        </li>
      @endforeach
    </ol>
  </div>

  <div class="sidebar-module">
    <h4>Around</h4>
    <ol class="list-unstyled">
      <li>
        <a href="https://github.com/dannybrown37/LearningLaravel" target="_blank">
          GitHub
        </a>
      </li>
    </ol>
  </div>
