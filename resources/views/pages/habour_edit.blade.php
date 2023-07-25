@extends('layouts.master')
@section('dashboard')


@endsection

@section('content')
<div class="container-fluid mt--7">
      <!-- Table -->
    <div class="row justify-content-center">
        
        <div class="col-md-8">
             <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                      
                      
                    </div>
          <div class="col-lg-6 col-5 text-right">
            
              <a href="{{ route('habour-location.update', $location->id) }}" class="btn btn-md btn-neutral">Back</a>
          </div>

                    
                  </div>
            <div class="card">
                <div class="card-header">Update harbour locations</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('habour-location.store') }}" enctype="multipart/form-data">
                         @csrf
                            @method('PUT')

                        <div class="form-group">
                            <label for="slug">Habour location name</label>
                            <input type="text" name="slug" id="slug" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="location_data">Location Data</label>
                            <textarea name="location_data" id="location_data" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="first_website_url">First Website URL</label>
                            <input type="text" name="first_website_url" id="first_website_url" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="first_site_duration">First Site Duration</label>
                            <input type="number" name="first_site_duration" id="first_site_duration" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="second_website_url">Second Website URL</label>
                            <input type="text" name="second_website_url" id="second_website_url" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="second_site_duration">Second Site Duration</label>
                            <input type="number" name="second_site_duration" id="second_site_duration" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="third_website_url">Third Website URL</label>
                            <input type="text" name="third_website_url" id="third_website_url" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="third_site_duration">Third Site Duration</label>
                            <input type="number" name="third_site_duration" id="third_site_duration" class="form-control">
                        </div>

                        <!-- Add fields for fourth_website_url, fourth_site_duration, fifth_website_url, fifth_site_duration, sixth_website_url, sixth_site_duration, seventh_website_url, seventh_site_duration -->

                        <div class="form-group">
                            <label for="first_image_url">First Image URL</label>
                            <input type="file" name="first_image_url" id="first_image_url" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="first_image_play_duration">First Image Play Duration</label>
                            <input type="number" min="0" step="0" name="first_image_play_duration" id="first_image_play_duration" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="second_image_url">Second Image URL</label>
                            <input type="file"  name="second_image_url" id="second_image_url" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="second_image_play_duration">Second Image Play Duration</label>
                            <input type="number" min="0" step="0" name="second_image_play_duration" id="second_image_play_duration" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="third_image_url">Third Image URL</label>
                            <input type="file" name="third_image_url" id="third_image_url" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="third_image_play_duration">Third Image Play Duration</label>
                            <input type="number" min="0" step="0" name="third_image_play_duration" id="third_image_play_duration" class="form-control">
                        </div>

                        <!-- Add fields for fourth_image_url, fourth_image_play_duration -->

                        <div class="form-group">
                            <label for="text_description">Text Description</label>
                            <textarea name="text_description" id="text_description" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="text_font_size">Text Font Size</label>
                            <input type="number" name="text_font_size" id="text_font_size" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="text_font_colour">Text Font Colour</label>
                            <input type="text" name="text_font_colour" id="text_font_colour" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="text_background_colour">Text Background Colour</label>
                            <input type="text" name="text_background_colour" id="text_background_colour" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="text_description_duration">Text Description Duration</label>
                            <input type="number" min="0" step="0" name="text_description_duration" id="text_description_duration" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="first_video_url">First Video URL</label>
                            <input type="file" name="first_video_url" id="first_video_url" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="first_video_play_duration">First Video Play Duration</label>
                            <input type="number" min="0" step="0" name="first_video_play_duration" id="first_video_play_duration" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="second_video_url">Second Video URL</label>
                            <input type="file" name="second_video_url" id="second_video_url" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="second_video_play_duration">Second Video Play Duration</label>
                            <input type="number" min="0" step="0" name="second_video_play_duration" id="second_video_play_duration" class="form-control">
                        </div>

                        <!-- Add fields for other video URLs and durations if needed -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Location</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection