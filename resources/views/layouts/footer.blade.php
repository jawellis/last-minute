@unless(auth()->user()->user_plus == 1)
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
