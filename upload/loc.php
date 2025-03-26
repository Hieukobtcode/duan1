<!-- Nút lọc sản phẩm -->
 
<!-- Bộ lọc và sắp xếp -->
<div class="filter-sort-container">
    <!-- Nút lọc -->
    
    <!-- Dropdown sắp xếp -->
    <form method="POST" id="sort-form" class="sort-form">
        <select name="sort_by" class="form-control" onchange="document.getElementById('sort-form').submit();">
            <option value="" disabled selected>Sắp xếp theo giá</option>
            <option value="asc" <?php echo isset($_POST['sort_by']) && $_POST['sort_by'] == 'asc' ? 'selected' : ''; ?>>
                Giá từ thấp đến cao
            </option>
            <option value="desc" <?php echo isset($_POST['sort_by']) && $_POST['sort_by'] == 'desc' ? 'selected' : ''; ?>>
                Giá từ cao đến thấp
            </option>
        </select>
    </form>
</div>

<!-- Overlay -->
<div class="popup-overlay" id="popup-overlay" onclick="hidePopup()"></div>


<style>
    
    /* Overlay */
    .filter-sort-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
    gap: 15px;
}

    .popup-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        z-index: 999;
    }

    /* Popup container */
    .filter-popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 90%;
        max-width: 400px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        z-index: 1000;
        display: none;
        animation: popup-show 0.3s ease-out;
    }

    /* Popup animation */
    @keyframes popup-show {
        from {
            opacity: 0;
            transform: translate(-50%, -60%);
        }

        to {
            opacity: 1;
            transform: translate(-50%, -50%);
        }
    }

    /* Close button */
    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background: transparent;
        border: none;
        font-size: 20px;
        color: #333;
        cursor: pointer;
    }

    /* Popup title */
    .popup-title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
        text-align: center;
    }

    /* Filter sections */
    .filter-section {
        margin-bottom: 20px;
    }

    .filter-title {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 10px;
        color: #555;
    }

    /* Filter options */
    .filter-options label {
        display: inline-block;
        margin-right: 10px;
        font-size: 14px;
        color: #333;
    }

    .filter-options input[type="checkbox"] {
        margin-right: 5px;
    }

    /* Price range inputs */
    .price-range {
        display: flex;
        gap: 10px;
    }

    .price-range input {
        flex: 1;
        padding: 8px 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    /* Apply button */
    .apply-btn {
        width: 100%;
        padding: 10px;
        background: #007bff;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .apply-btn:hover {
        background: #0056b3;
    }

    .sort-form {
    margin: 0;
    flex: 1;
    max-width: 250px;
}

.sort-form .form-control {
    padding: 8px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;
}
</style>