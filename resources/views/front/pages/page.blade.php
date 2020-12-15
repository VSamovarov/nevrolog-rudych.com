@extends('front.layouts.main')

@section('content')
<div class="hystmodal hystmodal--active" aria-hidden="false">
    <div class="hystmodal__wrap">
        <div class="hystmodal__window" role="dialog" aria-modal="true">
            <button class="hystmodal__close" data-hystclose="">×</button>
            <div class="hystmodal__content" >
                <div class="h1">Website Overview</div>
                <p>
                    Websites have many functions and can be used in various fashions; a website can be a personal website, a commercial website, a government website or a non-profit organization website. Websites can be the work of an individual, a business or other organization, and are typically dedicated to a particular topic or purpose.
                </p>
                <p>Any <a href="https://en.wikipedia.org/wiki/Website">website</a> can contain a hyperlink to any other website, so the distinction between individual sites, as perceived by the user, can be blurred. Websites are written in, or converted to, HTML (Hyper Text Markup Language) and are accessed using a software interface classified as a user agent. </p>
                <div class="h2">Static website</div>
                <p>A static website is one that has web pages stored on the server in the format that is sent to a client web browser. It is primarily coded in Hypertext Markup Language (HTML); Cascading Style Sheets (CSS) are used to control appearance beyond basic HTML. Images are commonly used to effect the desired appearance and as part of the main content. Audio or video might also be considered "static" content if it plays automatically or is generally non-interactive. This type of website usually displays the same information to all visitors. Similar to handing out a printed brochure to customers or clients, a static website will generally provide consistent, standard information for an extended period of time. Although the website owner may make updates periodically, it is a manual process to edit the text, photos and other content and may require basic website design skills and software. Simple forms or marketing examples of websites, such as classic website, a five-page website or a brochure website are often static websites, because they present pre-defined, static information to the user. This may include information about a company and its products and services through text, photos, animations, audio/video, and navigation menus.</p>

                <p>Static websites can be edited using four broad categories of software:</p>
                <button data-hystmodal="#modalSimple">Open simple modal</button>
                <button>Another button</button>
                <ul>
                    <li>Text editors, such as Notepad or TextEdit, where content and HTML markup are manipulated directly within the editor program</li>
                    <li>WYSIWYG offline editors, such as Microsoft FrontPage and Adobe Dreamweaver (previously Macromedia Dreamweaver), with which the site is edited using a GUI and the final HTML markup is generated automatically by the editor software</li>
                    <li>WYSIWYG online editors which create media rich online presentation like web pages, widgets, intro, blogs, and other documents.</li>
                    <li>Template-based editors such as iWeb allow users to create and upload web pages to a web server without detailed HTML knowledge, as they pick a suitable template from a palette and add pictures and text to it in a desktop publishing fashion without direct manipulation of HTML code.</li>
                </ul>
                <p>text from <a href="https://en.wikipedia.org/wiki/Website">Wikipedia</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
