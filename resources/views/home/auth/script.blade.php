<script src="../../shared/js/form-utils.js"></script>
<script>
    class MaterialForm {
        constructor() {
            this.form = document.getElementById('loginForm') || document.getElementById('registerForm');

            // Detect fields automatically
            this.nameInput = document.getElementById('name'); // exists only on register
            this.emailInput = document.getElementById('email');
            this.passwordInput = document.getElementById('password');
            this.passwordToggle = document.getElementById('passwordToggle');
            this.successMessage = document.getElementById('successMessage');
            this.submitButton = this.form.querySelector('.material-btn');
            this.socialButtons = document.querySelectorAll('.social-btn');
            this.roleInput = document.getElementById('role'); // register only

            this.init();
        }

        init() {
            this.bindEvents();
            this.setupPasswordToggle();
            this.setupSocialButtons();
            this.setupRippleEffects();
        }

        bindEvents() {
            this.form.addEventListener('submit', (e) => this.handleSubmit(e));

            // Validate only fields that exist
            if (this.nameInput) {
                this.nameInput.addEventListener('blur', () => this.validateName());
                this.nameInput.addEventListener('input', () => this.clearError('name'));
            }

            if (this.emailInput) {
                this.emailInput.addEventListener('blur', () => this.validateEmail());
                this.emailInput.addEventListener('input', () => this.clearError('email'));
            }

            if (this.passwordInput) {
                this.passwordInput.addEventListener('blur', () => this.validatePassword());
                this.passwordInput.addEventListener('input', () => this.clearError('password'));
            }
            
            if (this.roleInput) {
                this.roleInput.addEventListener('change', () => this.validateRole());
            }

            // Material focus/blur effect
            [this.nameInput, this.emailInput, this.passwordInput, this.roleInput].forEach(input => {
                if (!input) return;
                input.addEventListener('focus', (e) => this.handleInputFocus(e));
                input.addEventListener('blur', (e) => this.handleInputBlur(e));
            });
        }

        setupPasswordToggle() {
            if (!this.passwordToggle) return;

            this.passwordToggle.addEventListener('click', (e) => {
                const ripple = this.passwordToggle.querySelector('.toggle-ripple');
                this.createRipple(e, ripple);

                const newType = this.passwordInput.type === 'password' ? 'text' : 'password';
                this.passwordInput.type = newType;
                this.passwordToggle.querySelector('.toggle-icon')
                    .classList.toggle('show-password', newType === 'text');
            });
        }

        setupSocialButtons() {
            this.socialButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    const provider = button.classList.contains('google-material') ? 'Google' :
                        'Facebook';
                    this.createRipple(e, button.querySelector('.social-ripple'));
                    this.handleSocialLogin(provider, button);
                });
            });
        }

        setupRippleEffects() {
            [this.nameInput, this.emailInput, this.passwordInput].forEach(input => {
                if (!input) return;
                input.addEventListener('focus', (e) => {
                    const rippleContainer = input.parentNode.querySelector('.ripple-container');
                    this.createRipple(e, rippleContainer);
                });
            });

            this.submitButton.addEventListener('click', (e) => {
                this.createRipple(e, this.submitButton.querySelector('.btn-ripple'));
            });
        }

        createRipple(event, container) {
            if (!container) return;

            const rect = container.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = event.clientX - rect.left - size / 2;
            const y = event.clientY - rect.top - size / 2;

            const ripple = document.createElement('div');
            ripple.className = 'ripple';
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';

            container.appendChild(ripple);
            setTimeout(() => ripple.remove(), 600);
        }

        validateName() {
            if (!this.nameInput) return true; // LOGIN page — skip name validation

            const name = this.nameInput.value.trim();
            if (!name) return this.showError('name', 'Full name is required');
            if (!/^[a-zA-Z ]+$/.test(name)) return this.showError('name', 'Only letters allowed');

            this.clearError('name');
            return true;
        }

        validateEmail() {
            const email = this.emailInput.value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!email) return this.showError('email', 'Email is required');
            if (!emailRegex.test(email)) return this.showError('email', 'Enter a valid email');

            this.clearError('email');
            return true;
        }

        validatePassword() {
            const password = this.passwordInput.value;

            if (!password) return this.showError('password', 'Password is required');
            if (password.length < 6)
                return this.showError('password', 'Password must be at least 6 characters');

            this.clearError('password');
            return true;
        }

        validateRole() {
            if (!this.roleInput) return true; // login page

            const role = this.roleInput.value.trim();

            if (!role) {
                this.showError('role', 'Please select a role');
                return false;
            }

            this.clearError('role');
            return true;
        }

        showError(field, message) {
            const errorElement = document.getElementById(`${field}Error`);
            const input = document.getElementById(field);

            if (!errorElement || !input) return;

            errorElement.textContent = message;
            errorElement.classList.add('show');

            input.closest('.form-group').classList.add('error');

            // shake animation
            input.style.animation = 'materialShake 0.4s ease-in-out';
            setTimeout(() => input.style.animation = '', 400);

            return false;
        }

        clearError(field) {
            const errorElement = document.getElementById(`${field}Error`);
            const input = document.getElementById(field);
            if (!errorElement || !input) return;

            input.closest('.form-group').classList.remove('error');
            errorElement.classList.remove('show');

            setTimeout(() => errorElement.textContent = '', 150);
        }

        async handleSubmit(e) {
            e.preventDefault();

            // Validate only existing fields
            const okName = this.nameInput ? this.validateName() : true;
            const okRole = this.roleInput ? this.validateRole() : true;
            const okEmail = this.validateEmail();
            const okPassword = this.validatePassword();

            if (!okName || !okRole || !okEmail || !okPassword) {
                this.submitButton.style.animation = 'materialPulse 0.3s ease';
                setTimeout(() => this.submitButton.style.animation = '', 300);
                return;
            }

            this.setLoading(true);

            // Small animation delay
            await new Promise(resolve => setTimeout(resolve, 400));

            this.form.submit();
        }

        async handleSocialLogin(provider, button) {
            button.style.opacity = '0.7';
            button.style.pointerEvents = 'none';

            await new Promise(r => setTimeout(r, 1500));

            button.style.opacity = '1';
            button.style.pointerEvents = 'auto';
        }

        setLoading(loading) {
            this.submitButton.classList.toggle('loading', loading);
            this.submitButton.disabled = loading;
        }
    }

    // Init script
    document.addEventListener('DOMContentLoaded', () => {
        new MaterialForm();
    });
</script>
