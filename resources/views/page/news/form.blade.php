<div class="form-group">
  <label>Title</label>
  <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{ (!empty($news)? $news->title : '' ) }}">
</div>
<div class="form-group">
  <label>Description</label>
  <textarea class="form-control" rows="10" name="description" placeholder="Enter Description">{{ (!empty($news)? $news->description : '' ) }}</textarea>
</div>

<div class="checkbox">
  <label>
    <input type="checkbox" name="active" {{ (!empty($news) ? (($news->active==1) ? 'checked' : '') : '' ) }}> Set Active
  </label>
</div>