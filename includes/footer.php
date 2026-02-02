</main>
<footer>
    <p>&copy; 2026 Tushar Dhonju. All rights reserved.</p>
</footer>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Delete Item</h3>
            <button class="modal-close" onclick="closeDeleteModal()">&times;</button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete <strong id="modalItemName"></strong>?</p>
            <p style="color: #d4a574; font-size: 0.9rem;">This action cannot be undone.</p>
        </div>
        <div class="modal-footer">
            <button class="button button-secondary" onclick="closeDeleteModal()">Cancel</button>
            <button class="button button-danger" onclick="confirmDelete()">Delete</button>
            <input type="hidden" id="modalDeleteId">
        </div>
    </div>
</div>

<script src="../assets/js/main.js"></script>
<script src="../assets/js/modal.js"></script>

<script>
    // Add to cart functionality
    let cartCount = 0;

    // Create notification element
    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        background: linear-gradient(135deg, #4caf50 0%, #45a049 100%);
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        z-index: 9999;
        display: none;
        font-size: 1rem;
        font-weight: 500;
        animation: slideIn 0.3s ease;
    `;
    document.body.appendChild(notification);

    // Create floating checkout button
    const checkoutBtn = document.createElement('div');
    checkoutBtn.style.cssText = `
        position: fixed;
        bottom: 30px;
        right: 30px;
        background: linear-gradient(135deg, #d4a574 0%, #c49464 100%);
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(93, 64, 55, 0.4);
        z-index: 9998;
        display: none;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
        max-width: 200px;
    `;
    checkoutBtn.innerHTML = `
        <div style="font-size: 1.5rem; margin-bottom: 0.5rem;">🛒</div>
        <div>View Cart</div>
        <div style="font-size: 0.9rem; margin-top: 0.3rem;">and Checkout</div>
    `;
    checkoutBtn.addEventListener('mouseenter', function () {
        this.style.transform = 'translateY(-5px)';
        this.style.boxShadow = '0 6px 20px rgba(93, 64, 55, 0.5)';
    });
    checkoutBtn.addEventListener('mouseleave', function () {
        this.style.transform = 'translateY(0)';
        this.style.boxShadow = '0 4px 15px rgba(93, 64, 55, 0.4)';
    });
    checkoutBtn.addEventListener('click', function () {
        window.location.href = 'cart.php';
    });
    document.body.appendChild(checkoutBtn);

    function showNotification(message) {
        notification.textContent = message;
        notification.style.display = 'block';
        setTimeout(() => {
            notification.style.display = 'none';
        }, 2000);
    }

    function updateCartBadge() {
        const badge = document.getElementById('cartCount');
        if (badge && cartCount > 0) {
            badge.textContent = `(${cartCount})`;
            badge.style.display = 'inline';
            badge.style.animation = 'pulse 0.3s ease';
        }

        // Show/hide checkout button
        if (cartCount > 0) {
            checkoutBtn.style.display = 'block';
            checkoutBtn.style.animation = 'slideIn 0.3s ease';
        } else {
            checkoutBtn.style.display = 'none';
        }
    }

    function setupAddToCart() {
        const buttons = document.querySelectorAll(".add-to-cart-btn");

        buttons.forEach(btn => {
            // Remove any existing listeners by cloning
            const newBtn = btn.cloneNode(true);
            btn.parentNode.replaceChild(newBtn, btn);

            newBtn.addEventListener("click", function (e) {
                e.preventDefault();
                e.stopPropagation();

                const itemId = this.dataset.itemId;
                const itemName = this.closest('.menu-item').querySelector('strong').textContent;

                const originalText = this.textContent;
                this.textContent = "✓ Added!";
                this.style.background = "#4caf50";
                this.disabled = true;

                const xhr = new XMLHttpRequest();
                xhr.open("GET", "cart.php?add=" + itemId, true);
                xhr.withCredentials = true;

                xhr.onload = () => {
                    cartCount++;
                    updateCartBadge();
                    showNotification(`✓ ${itemName} added to cart!`);

                    setTimeout(() => {
                        this.textContent = originalText;
                        this.style.background = "";
                        this.disabled = false;
                    }, 1500);
                };

                xhr.send();
            }, { once: true });
        });
    }

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", setupAddToCart);
    } else {
        setupAddToCart();
    }
</script>

<style>
    @keyframes slideIn {
        from {
            transform: translateX(400px);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.2);
        }
    }
</style>

</body>

</html>