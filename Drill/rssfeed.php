<?php
$feed = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $feed = $_POST['site'] ?? 1;
}
?>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHPドリル</title>
</head>
<body> 
  <h1>ニュースリーダー</h1>
  <form method="POST">
    <p><label><input type="radio" name="site" value=1 <?php if ($feed==0||$feed==1) echo 'checked'; ?>>Yahoo! Japan</label>
    <label><input type="radio" name="site" value=2 <?php if ($feed==2) echo 'checked'; ?>>NHKニュース</label>
    <label><input type="radio" name="site" value=3 <?php if ($feed==3) echo 'checked'; ?>>ITメディア</label></p>
    <p><button type="submit">送信</button></p>
  </form>
	<?php
    // RSSフィードのURL
    if ($feed!=0) {
      if ($feed==1) {
        $feed_url = "https://news.yahoo.co.jp/rss/topics/top-picks.xml";
      } else if ($feed==2) {
        $feed_url = "https://www.nhk.or.jp/rss/news/cat0.xml";
      } else if ($feed==3) {
        $feed_url = "https://rss.itmedia.co.jp/rss/2.0/itmedia_all.xml";
      }
      // SimpleXMLを使用してRSSフィードを読み込む
      $xml = simplexml_load_file($feed_url);
    }
  ?>
  <h2>ニュース一覧</h2>
  <?php if ($feed!=0) { ?>
    <?php
    if ($feed==1) echo "<p>Yahoo! Japan</p>";
    else if ($feed==2) echo "<p>NHKニュース</p>";
    else echo "<p>ITメディア</p>";
    ?>
  <table border="1">
    <tr>
      <th width="30%">タイトル</th>
      <?php if (isset($xml->channel->item[0]->description)) { ?>
        <th width="60%">説明</th>
      <?php } ?>
      <th width="10%">リンク</th>
    </tr>
    <?php foreach ($xml->channel->item as $item) { ?>
    <tr>
      <td><?= $item->title ?></td>
      <?php if (isset($item->description)) { ?>
        <td><?= $item->description ?></td>
      <?php } ?>
      <td><a href=<?="{$item->link}"?>>続きを読む</a></td>
    </tr>
    <?php } ?>
  </table>
  <?php } ?>
</body>
</html>
