<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Third Page</title>
    <link rel="stylesheet" href="{{ asset('css/summary-page.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/bottomButton.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/title.css') }}"> 

</head>

<body class="summaryphase">
<div>
    @include('layout.selection')
</div>
<div class="white-back">
    <p class="green-underline">配信内容を確認してください</p>

    <div class="grid-container">
        <div class="grid-item left-grid-item uniqueborderone">
            ターゲット名
        </div>
        <div class="grid-item">
            {{ $target }}
        </div>
        <div class="grid-item left-grid-item uniquebordertwo">
            ターゲット詳細
        </div>
        <div class="grid-item uniqueborderthree">
        </div>
    </div>

    <div class="target-content-template-box">
        <div class="target-content-template">
            {{ $target }} / コンテント{{ $contentWord }} / テンプレート{{ $templateTitle }}
        </div>
    </div>

    <div>プレビュー</div>

    <div class="preview">
        <div>
            <img src="{{ asset('images/saleslab.png')}}" alt="User Icon" class="image-saleslab">
        </div>
        <div class="preview-inside" style="background-color: white;">
            <td style="padding: 10px 20px;">
                <div>
                    <div>
                        <div id="react-tinymce-1" style="position: relative;" contenteditable="true">
                            <h3 style="font-size:28px;">インパクトがある見出し　テンプレート{{$templateTitle}}</h3>
                            <h3>詳細を伝えます</h3>
                            <p>見出しと小見出しが<a href="#">オファー</a>の内容を説明するものなら、取引の成立に直結するのがフォームヘッダーです。ここでは、お客様がフォームに入力したくなるように、こちらのオファーがいかに素晴らしいかを説明します。</p>
                            <p>注意：</p>
                            <ul>
                                <li>箇条書きは効果的です。</li>
                                <li><a href="#">利点</a>を挙げて、</li>
                                <li>訪問者をリードに転換しましょう。</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </td>

            <img alt="preview" src="https://45458682.fs1.hubspotusercontent-na1.net/hub/45458682/hubfs/preview.webp?width=480&amp;upscale=true&amp;name=preview.webp" style="max-width: 100%; font-size: 16px; display: block; padding: 20px; margin: 0 auto;" width="240">

            <!-- 時間がなくいったんhubspotからそのままコードをとってきています。あとで修正します。 -->
            <div style="display: flex; justify-content: center;">
                <table cellpadding="0" cellspacing="0" role="presentation" style="border-collapse: separate !important;">
                    <tbody>
                        <tr>
                            <td valign="middle" style="border-radius: 8px; cursor: pointer; background-color: #197FC4; text-align: center;">
                                <a href="https://www.saleslab.jp/" target="_blank" style="font-size: 16px; font-family: Arial, Helvetica, sans-serif; color: #ffffff; text-decoration: none; padding: 12px 18px; display: block;">
                                    <strong>資料はこちら</strong>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <td style="padding: 10px 20px;">
                <div data-module-wrapper="true">
                    <div>
                        <div id="react-tinymce-3" style="position: relative;" contenteditable="true" class="mce-content-body">
                            <h3 style="font-size:28px;">最新のニュースや情報をシェアする</h3>
                            <div style="text-align:center; margin-bottom:20px;" >主なトピックは何かを読者に明かして演出効果を高めます。対応するウェブページまたはブログ記事にリンクするCTAボタンと共に、メインとなるストーリーをEメールの冒頭に記載します。ただし、Eメールに記載するのはストーリーの一部にとどめます。</div>
                            <div style="text-align:center">ニュースレターを同僚とシェアしたり、ソーシャルメディアで紹介したりするようにお願いしましょう。</div>
                        </div>
                    </div>
                </div>
            </td>
        </div>
    </div>
</div>


<div class="center-bottom-buttons">
    <div class="button-wrapper">
        <a href="contentselection" class="pagemovement-button left">前へ戻る</a>
        <a href="contentselection" class="pagemovement-button under">最初から設定</a>
        <a href="timeselection" class="pagemovement-button right">配信タイミングの設定</a>
    </div>
</div>


<script>
        function autoExpand(textarea) {
            // Reset textarea height to default to properly calculate new height
            textarea.style.height = '100px';
            // Set new height based on scrollHeight
            textarea.style.height = textarea.scrollHeight + 'px';
        }
    </script>
</body>
</html> 
