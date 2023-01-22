@foreach($notices as $notice)
    <footer>
        @unless((Auth()->user()->user_plus == 1) || (count(Auth::user()->notices()->get()) <= 1))
            <section>
                <footer class="sticky-footer">
                    <p>Want to make as many plans as you want? Go Plus!</p>
                </footer>
            </section>
        @else
            <section >
                <footer class="sticky-footer">
                    <section class="bottom-nav">
                        <a href="/createNotice"> + </a>
                    </section>
                </footer>
            </section>
        @endunless
    </footer>
@endforeach
