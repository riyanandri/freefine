<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="form-group">
    <label for="parent_id">Kategori Level</label>
    <select name="parent_id" id="parent_id" class="form-control select">
        <option value="0" @if(isset($category['parent_id']) && $category['parent_id']==0) selected @endif>Kategori Utama</option>
        @if (!empty($getCategories))
        @foreach ($getCategories as $parentcategory)
        <option value="{{ $parentcategory['id'] }}" @if(isset($category['parent_id']) && $category['parent_id']==$parentcategory['id']) selected @endif>{{ $parentcategory['nama_kategori'] }}</option>
        @if (!empty($parentcategory['subcategories']))
        @foreach ($parentcategory['subcategories'] as $subcategory)
        <option value="{{ $subcategory['id'] }}" @if(isset($category['parent_id']) && $category['parent_id']==$subcategory['id']) selected @endif>&nbsp;&raquo;&nbsp;{{ $subcategory['nama_kategori'] }}</option>
        @endforeach
        @endif
        @endforeach
        @endif
    </select>
</div>
