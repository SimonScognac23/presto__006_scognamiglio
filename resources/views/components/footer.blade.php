<!-- Footer -->
<footer class="footer-custom text-center py-3 mt-0">
    <!-- Info P.IVA e proprietario -->
    <p class="mb-1 text-gold">P.IVA: 12345678901</p>
    <p class="mb-3 text-gold">{{ __('ui.blog_owner') }}</p>

    <!-- Sezione Social -->
    <div class="d-flex justify-content-center align-items-center gap-3">

        <a href="https://facebook.com" class="footer-link" aria-label="Facebook" target="_blank" rel="noopener">
            <i class="bi bi-facebook fs-4"></i>
        </a>
        <a href="https://instagram.com" class="footer-link" aria-label="Instagram" target="_blank" rel="noopener">
            <i class="bi bi-instagram fs-4"></i>
        </a>
        <a href="https://tiktok.com" class="footer-link" aria-label="TikTok" target="_blank" rel="noopener">
            <i class="bi bi-tiktok fs-4"></i>
        </a>

        <!-- Sezione diventa revisore con la rotta become.revisor -->
        <a href="{{ route('become.revisor') }}" class="footer-link fw-bold" aria-label="{{ __('ui.become_revisor') }}">
            {{ __('ui.become_revisor') }}
        </a>

    </div>
</footer>



