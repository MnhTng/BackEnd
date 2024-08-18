# CKEditor 5 sample

Thank you for downloading the sample. To run it, start a web server (`nginx`, `caddy` or any other) that will serve the file.

Want to test more features? Get started with CKEditor 5 Builder 🚀

With [CKEditor’s interactive builder](https://ckeditor.com/ckeditor-5/builder/), select:

* The features you need.
* Your preferred framework (React, Angular, Vue, or Vanilla JS).
* Your preferred distribution method (CDN or npm).

You’ll get ready-to-use code snippets, tailored to your needs.

<!-- ! Cấu trúc CKEditor    
*   import { ClassicEditor, Essentials } from 'ckeditor5';

*   ClassicEditor
        .create( document.querySelector( '#editor' ), {
            menuBar: {
                isVisible: true | false
            },
            plugins: [ Essentials, /* ... */ ],
            blockToolbar: { 
                items: [ '/* ... */' ],
            },
            toolbar: {
                items: [ '/* ... */' ],
                removeItems: [ '/* ... */' ],
                shouldNotGroupWhenFull: true('-' use for finish line and begin new line) | false
            }
        ? hoặc    
            removePlugins: [ 'Essentials', '/* ... */' ],
            toolbar: [ '/* ... */' ]
        } )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
 -->

<!-- ! Các loại CKEditor
*   ClassicEditor
*   InlineEditor
*   BalloonEditor
 -->

<!-- ! Thay đổi icon
*   threeVerticalDots(default)
*   alignLeft
*   bold
*   importExport
*   paragraph
*   text
*   plus
*   dragIndicator
*   pilcrow
*   false
*   <svg></svg>
 -->

<!-- ! Hiển thị tất cả các mục trên thanh công cụ
*   Array.from( editor.ui.componentFactory.names() );
 -->

<!-- ! Get và Set dữ liệu trong trường #editor 
*   editor.getData();
*   editor.setData( '<p>Modified from the console!</p>' );
 -->

<!-- ! Các thao tác khác
*   editor.execute( 'undo' );
*   editor.execute( 'redo' );
*   editor.destroy();
 -->
