@extends('admin.layouts.main')

@section('main')
<style>
body{
    background:#f4f6f9;
    font-family: 'Segoe UI', sans-serif;
}

/* Card */
.product-card{
    border-radius:14px;
    border:none;
}

/* Header */
.product-header{
    background:linear-gradient(135deg,#111,#222);
    color:#ffc107;
    border-radius:14px 14px 0 0;
}

/* Section title */
.section-title{
    font-size:15px;
    font-weight:600;
    color:#111;
    margin-bottom:12px;
}

/* Inputs */
.form-control,.form-select{
    border-radius:10px;
    padding:10px 14px;
}

/* Upload box */
.upload-box{
    border:2px dashed #ccc;
    border-radius:12px;
    padding:20px;
    background:#fff;
    text-align:center;
    cursor:pointer;
    transition:.3s;
}
.upload-box:hover{
    border-color:#ffc107;
    background:#fffbea;
}

/* Image preview */
.preview-grid{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(100px,1fr));
    gap:12px;
    margin-top:15px;
}
.preview-img{
    position:relative;
}
.preview-img img{
    width:100%;
    height:100px;
    object-fit:cover;
    border-radius:10px;
    border:1px solid #ddd;
}

/* Save button */
.btn-save{
    background:#ffc107;
    color:#111;
    font-weight:600;
    border-radius:30px;
    padding:10px 30px;
}
.btn-save:hover{
    background:#e0ac06;
}
</style>
<div class="container">
<div class="card shadow product-card">

    <!-- Header -->
    <div class="product-header p-4">
        <h4 class="mb-0">
            <i class="bi bi-bag-plus-fill me-2"></i> Add New Product
        </h4>
        <small class="text-light">Manage product details carefully</small>
    </div>

    <div class="card-body p-4">

        <!-- BASIC INFO -->
        <div class="section-title">
            <i class="bi bi-info-circle-fill text-warning me-1"></i> Basic Information
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label class="form-label">Product Name</label>
                <input type="text" class="form-control" placeholder="Apple iPhone 15 Pro">
            </div>
            <div class="col-md-6">
                <label class="form-label">Category</label>
                <select class="form-select">
                    <option>Fashion</option>
                    <option>Books</option>
                    <option>Electronics</option>
                </select>
            </div>
        </div>

        <!-- PRICING -->
        <div class="section-title">
            <i class="bi bi-cash-stack text-warning me-1"></i> Pricing & Stock
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <label>Price (₹)</label>
                <input type="number" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Discount (%)</label>
                <input type="number" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Stock</label>
                <input type="number" class="form-control">
            </div>
        </div>

        <!-- DESCRIPTION -->
        <div class="section-title">
            <i class="bi bi-card-text text-warning me-1"></i> Description
        </div>

        <textarea class="form-control mb-4" rows="4"
        placeholder="Write detailed product description..."></textarea>

        <!-- IMAGE UPLOAD -->
        <div class="section-title">
            <i class="bi bi-images text-warning me-1"></i> Product Images
        </div>

        <label class="upload-box w-100">
            <i class="bi bi-cloud-arrow-up-fill fs-2 text-warning"></i>
            <p class="mb-0 fw-semibold">Click to upload images</p>
            <small class="text-muted">Multiple images allowed</small>
            <input type="file" class="d-none" multiple onchange="previewImages(event)">
        </label>

        <!-- Preview -->
        <div class="preview-grid" id="imagePreview"></div>

        <!-- ACTION -->
        <div class="text-end mt-4">
            <button class="btn btn-save">
                <i class="bi bi-save-fill me-1"></i> Save Product
            </button>
        </div>

    </div>
</div>
</div>
<script>
function previewImages(event){
    const preview = document.getElementById('imagePreview');
    preview.innerHTML = "";

    Array.from(event.target.files).forEach(file=>{
        const reader = new FileReader();
        reader.onload = e=>{
            const div = document.createElement('div');
            div.className = "preview-img";
            div.innerHTML = `<img src="${e.target.result}">`;
            preview.appendChild(div);
        };
        reader.readAsDataURL(file);
    });
}
</script>


@endsection
