<?php
if (isset($_POST['btn_add']))
    echo $_POST['content'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./ckeditor5/ckeditor5.css">
    <title>CKEditor 5</title>
</head>

<body>
    <style>
        .main-container {
            width: 750px;
            margin: auto;
        }
    </style>

    <!-- <div class="main-container"></div> -->
    <!-- <div id="editor"> -->
    <!-- <p>Hello from CKEditor 5!</p> -->
    <!-- </div> -->

    <div class="main-container">
        <form action="" method="post">
            <textarea id="editor" name="content">
                <h1>Hello from CKEditor 5!</h1>

                <p>
                    An <a target="_blank" rel="noopener noreferrer" href="https://ckeditor.com">external page</a> 
                    and a <a href="https://images.pexels.com/photos/417074/pexels-photo-417074.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" download="download">downloadable resource</a>.
                </p>

                <table>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Age</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Nguyen Van A</td>
                            <td>20</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Nguyen Van B</td>
                            <td>21</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Nguyen Van C</td>
                            <td>22</td>
                        </tr>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="3">Total: 3</td>
                        </tr>
                    </tfoot>
                </table>

                <img src="https://images.pexels.com/photos/417074/pexels-photo-417074.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="">
            </textarea>
            <br>

            <button type="submit" name="btn_add" value="submit_add">Add</button>
        </form>
    </div>

    <script type="importmap">
        {
				"imports": {
					"ckeditor5": "./ckeditor5/ckeditor5.js",
					"ckeditor5/": "./ckeditor5/"
				}
			}
		</script>
    <script type="module">
        import {
            InlineEditor,
            Autoformat,
            TextTransformation,
            Autosave,
            Mention,
            Markdown,
            PasteFromOffice,
            Clipboard,
            PasteFromMarkdownExperimental,
            Essentials,
            ShowBlocks,
            SelectAll,
            SourceEditing,
            Heading,
            TextPartLanguage,
            Paragraph,
            Bold,
            Italic,
            Underline,
            Strikethrough,
            Subscript,
            Superscript,
            Code,
            Font,
            FindAndReplace,
            RemoveFormat,
            Link,
            AutoLink,
            Image,
            ImageUpload,
            ImageInsert,
            AutoImage,
            ImageCaption,
            ImageResize,
            ImageStyle,
            ImageToolbar,
            LinkImage,
            Table,
            TableToolbar,
            TableProperties,
            TableCellProperties,
            TableColumnResize,
            TableCaption,
            SpecialCharacters,
            SpecialCharactersEssentials,
            Highlight,
            MediaEmbed,
            BlockQuote,
            CodeBlock,
            HorizontalLine,
            PageBreak,
            Alignment,
            List,
            TodoList,
            AdjacentListsSupport,
            Indent
        } from 'ckeditor5';

        InlineEditor
            .create(document.querySelector('#editor'), {
                plugins: [
                    InlineEditor,
                    Autoformat,
                    TextTransformation,
                    Autosave,
                    Mention,
                    // Markdown,
                    PasteFromOffice,
                    Clipboard,
                    PasteFromMarkdownExperimental,
                    Essentials,
                    ShowBlocks,
                    SelectAll,
                    SourceEditing,
                    Heading,
                    TextPartLanguage,
                    Paragraph,
                    Bold,
                    Italic,
                    Underline,
                    Strikethrough,
                    Subscript,
                    Superscript,
                    Code,
                    Font,
                    FindAndReplace,
                    RemoveFormat,
                    Link,
                    AutoLink,
                    Image,
                    ImageUpload,
                    ImageInsert,
                    AutoImage,
                    ImageCaption,
                    ImageResize,
                    ImageStyle,
                    ImageToolbar,
                    LinkImage,
                    Table,
                    TableToolbar,
                    TableProperties,
                    TableCellProperties,
                    TableColumnResize,
                    TableCaption,
                    SpecialCharacters,
                    SpecialCharactersEssentials,
                    Highlight,
                    MediaEmbed,
                    BlockQuote,
                    CodeBlock,
                    HorizontalLine,
                    PageBreak,
                    Alignment,
                    List,
                    TodoList,
                    AdjacentListsSupport,
                    Indent
                ],
                placeholder: 'Type the content here!',
                toolbar: {
                    items: [
                        'undo', 'redo',
                        '|',
                        'showBlocks', 'selectAll',
                        '|',
                        'sourceEditing',
                        '|',
                        'heading',
                        '|',
                        'textPartLanguage',
                        '-',
                        'bold', 'italic', 'underline',
                        {
                            label: 'More Basic Styles',
                            icon: '',
                            items: ['strikethrough', 'subscript', 'superscript', 'code']
                        },
                        '|',
                        {
                            label: 'Font style',
                            icon: 'text',
                            tooltip: 'Font format',
                            withText: true,
                            items: ['fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor']
                        },
                        '|',
                        'findAndReplace', 'removeFormat',
                        '-',
                        'link', 'insertImage', 'insertTable', 'specialCharacters', 'highlight',
                        {
                            label: 'Block',
                            icon: 'plus',
                            items: ['mediaEmbed', 'blockQuote', 'codeBlock', 'horizontalLine', 'pageBreak']
                        },
                        '|',
                        'alignment',
                        '|',
                        'bulletedList', 'numberedList', 'todoList', 'indent', 'outdent'
                    ],
                    removeItems: [],
                    shouldNotGroupWhenFull: true
                },
                mention: {
                    dropdownLimit: 4,
                    feeds: [{
                        marker: '@',
                        feed: getFeedItems,
                        // feed: ['@Barney', '@Lily', '@Marry Ann', '@Marshall', '@Robin', '@Ted'],
                        minimumCharacters: 1
                    }]
                },
                menuBar: {
                    isVisible: true
                },
                autosave: {
                    waitingTime: 5000, // in ms
                    save(editor) {}
                },
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                link: {
                    // Automatically add target="_blank" and rel="noopener noreferrer" to all external links.
                    addTargetToExternalLinks: true,

                    // Let the users control the "download" attribute of each link.
                    decorators: {
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        },
                        openInNewTab: {
                            mode: 'manual',
                            label: 'Open in a new tab',
                            defaultValue: true, // This option will be selected by default.
                            attributes: {
                                target: '_blank',
                                rel: 'noopener noreferrer'
                            }
                        }
                    }
                },
                table: {
                    contentToolbar: [
                        'toggleTableCaption',
                        '|',
                        'insertTable',
                        '|',
                        'tableColumn', 'tableRow', 'mergeTableCells',
                        '|',
                        'tableProperties', 'tableCellProperties'
                    ],
                    tableProperties: {
                        // The default styles for tables in the editor.
                        // They should be synchronized with the content styles.
                        defaultProperties: {
                            borderStyle: 'dashed',
                            borderColor: 'hsl(90, 75%, 60%)',
                            borderWidth: '3px',
                            alignment: 'left',
                            width: '550px',
                            height: '450px'
                        },
                        // The default styles for table cells in the editor.
                        // They should be synchronized with the content styles.
                        tableCellProperties: {
                            defaultProperties: {
                                horizontalAlignment: 'center',
                                verticalAlignment: 'bottom',
                                padding: '10px'
                            }
                        }
                    }
                },
                image: {
                    toolbar: [
                        'resizeImage',
                        '|',
                        'imageStyle:inline',
                        'imageStyle:wrapText',
                        'imageStyle:breakText',
                        '|',
                        'toggleImageCaption',
                        'imageTextAlternative',
                        '|',
                        'ckboxImageEdit',
                        '|',
                        'linkImage'
                    ],
                    insert: {
                        // If this setting is omitted, the editor defaults to 'block'.
                        // See explanation below.
                        type: 'auto'
                    },
                    resizeOptions: [{
                            name: 'resizeImage:original',
                            value: null,
                            icon: 'original'
                        },
                        {
                            name: 'resizeImage:custom',
                            value: 'custom',
                            icon: 'custom'
                        },
                        {
                            name: 'resizeImage:25',
                            value: '25',
                            icon: 'small'
                        },
                        {
                            name: 'resizeImage:50',
                            value: '50',
                            icon: 'medium'
                        },
                        {
                            name: 'resizeImage:75',
                            value: '75',
                            icon: 'large'
                        }
                    ]
                },
                typing: {
                    transformations: {
                        remove: [
                            // Do not use the transformations from the
                            // 'symbols' and 'quotes' groups.
                            'symbols',
                            'quotes',

                            // As well as the following transformations.
                            'arrowLeft',
                            'arrowRight'
                        ],

                        extra: [
                            // Add some custom transformations, for example, for emojis.
                            {
                                from: ':)',
                                to: '🙂'
                            },
                            {
                                from: ':+1:',
                                to: '👍'
                            },
                            {
                                from: ':tada:',
                                to: '🎉'
                            },

                            // You can also define patterns using regular expressions.
                            // Note: The pattern must end with `$` and all its fragments must be wrapped with capturing groups.
                            // The following rule replaces ` "foo"` with ` «foo»`.
                            {
                                from: /(^|\s)(")([^"]*)(")$/,
                                to: [null, '«', null, '»']
                            },

                            {
                                from: /(^|\n)([a-z])/,
                                to: matches => [null, matches[1].toUpperCase()]
                            },

                            // Finally, you can define `to` as a callback.
                            // This (naive) rule will auto-capitalize the first word after a period, question mark, or an exclamation mark.
                            {
                                from: /([.?!])([a-z])$/,
                                to: matches => [null, matches[1].toUpperCase()]
                            },

                            {
                                from: /([.?!] )([a-z])$/,
                                to: matches => [null, matches[1].toUpperCase()]
                            }
                        ],
                    }
                }
            })
            .then(editor => {
                window.editor = editor;
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        // MENTION
        const items = [{
                id: '@swarley',
                userId: '1',
                name: 'Barney Stinson',
                link: 'https://www.imdb.com/title/tt0460649/characters/nm0000439'
            },
            {
                id: '@lilypad',
                userId: '2',
                name: 'Lily Aldrin',
                link: 'https://www.imdb.com/title/tt0460649/characters/nm0004989'
            },
            {
                id: '@marry',
                userId: '3',
                name: 'Marry Ann Lewis',
                link: 'https://www.imdb.com/title/tt0460649/characters/nm1130627'
            },
            {
                id: '@marshmallow',
                userId: '4',
                name: 'Marshall Eriksen',
                link: 'https://www.imdb.com/title/tt0460649/characters/nm0781981'
            },
            {
                id: '@rsparkles',
                userId: '5',
                name: 'Robin Scherbatsky',
                link: 'https://www.imdb.com/title/tt0460649/characters/nm1130627'
            },
            {
                id: '@tdog',
                userId: '6',
                name: 'Ted Mosby',
                link: 'https://www.imdb.com/title/tt0460649/characters/nm1102140'
            }
        ];

        function getFeedItems(queryText) {
            // As an example of an asynchronous action, return a promise
            // that resolves after a 100ms timeout.
            // This can be a server request or any sort of delayed action.
            return new Promise(resolve => {
                setTimeout(() => {
                    const itemsToDisplay = items
                        // Filter out the full list of all items to only those matching the query text.
                        .filter(isItemMatching)
                        // Return 10 items max - needed for generic queries when the list may contain hundreds of elements.
                        .slice(0, 10);

                    resolve(itemsToDisplay);
                }, 100);
            });

            // Filtering function - it uses the `name` and `username` properties of an item to find a match.
            function isItemMatching(item) {
                // Make the search case-insensitive.
                const searchString = queryText.toLowerCase();

                // Include an item in the search results if the name or username includes the current user input.
                return (
                    item.name.toLowerCase().includes(searchString) ||
                    item.id.toLowerCase().includes(searchString)
                );
            }
        }
    </script>
    <!-- A friendly reminder to run on a server, remove this during the integration. -->
    <script>
        window.onload = function() {
            if (window.location.protocol === "file:") {
                alert("This sample requires an HTTP server. Please serve this file with a web server.");
            }
        };
    </script>
</body>

</html>