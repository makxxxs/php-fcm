<?php
namespace paragraph1\phpFCM;

/**
 * @link https://firebase.google.com/docs/cloud-messaging/http-server-ref#notification-payload-support
 */
class Notification implements \JsonSerializable
{
    private $title;
    private $body;
    private $badge;
    private $icon;
    private $color;
    private $sound;
    private $clickAction;
    private $tag;

    private $bodyLocKey;
    private $bodyLocArgs;
    private $titleLocKey;
    private $titleLocArgs;

    public function __construct($title, $body)
    {
        $this->title = $title;
        $this->body = $body;
    }

    /**
     * android only: notification title (also works for ios watches)
     *
     * @param string $title
     *
     * @return \paragraph1\phpFCM\Notification
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * android/ios: the body text is the main content of the notification
     *
     * @param string $body
     *
     * @return \paragraph1\phpFCM\Notification
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * iOS only: will add smal red bubbles indicating the number of notifications to your apps icon
     *
     * @param integer $badge
     *
     * @return \paragraph1\phpFCM\Notification
     */
    public function setBadge($badge)
    {
        $this->badge = $badge;
        return $this;
    }

    /**
     * android only: set the name of your drawable resource as string
     *
     * @param string $icon the drawable name without .xml
     *
     * @return \paragraph1\phpFCM\Notification
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * android only: background color of the notification icon when showing details on notifications
     *
     * @param string $color in #rrggbb format
     *
     * @return \paragraph1\phpFCM\Notification
     */
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    /**
     * android/ios: what should happen upon notification click. when empty on android the default activity
     * will be launched passing any payload to an intent.
     *
     * @param string $actionName on android: intent name, on ios: category in apns payload
     *
     * @return \paragraph1\phpFCM\Notification
     */
    public function setClickAction($actionName)
    {
        $this->clickAction = $actionName;
        return $this;
    }

    /**
     * android only: when set notification will replace prior notifications from the same app with the same
     * tag.
     *
     * @param string $tag
     *
     * @return \paragraph1\phpFCM\Notification
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
        return $this;
    }

    /**
     * android/ios: can be default or a filename of a sound resource bundled in the app.
     * @see https://firebase.google.com/docs/cloud-messaging/http-server-ref#notification-payload-support
     *
     * @param string $sound a sounds filename
     *
     * @return \paragraph1\phpFCM\Notification
     */
    public function setSound($sound)
    {
        $this->sound = $sound;
        return $this;
    }

    /**
     * @param string $bodyLocKey
     * @return $this
     */
    public function setBodyLocKey($bodyLocKey)
    {
        $this->bodyLocKey = $bodyLocKey;
        return $this;
    }

    /**
     * @param array $bodyLocArgs
     * @return $this
     */
    public function setBodyLocArgs($bodyLocArgs)
    {
        $this->bodyLocArgs = $bodyLocArgs;
        return $this;
    }

    /**
     * @param string $titleLocKey
     * @return $this
     */
    public function setTitleLocKey($titleLocKey)
    {
        $this->titleLocKey = $titleLocKey;
        return $this;
    }

    /**
     * @param array $titleLocArgs
     * @return $this
     */
    public function setTitleLocArgs($titleLocArgs)
    {
        $this->titleLocArgs = $titleLocArgs;
        return $this;
    }

    public function jsonSerialize()
    {
        $jsonData = array();

        if ($this->title) {
            $jsonData['title'] = $this->title;
        }

        $jsonData['body'] = $this->body;

        if ($this->badge) {
            $jsonData['badge'] = $this->badge;
        }
        if ($this->icon) {
            $jsonData['icon'] = $this->icon;
        }
        if ($this->clickAction) {
            $jsonData['click_action'] = $this->clickAction;
        }
        if ($this->sound) {
            $jsonData['sound'] = $this->sound;
        }
        if ($this->color) {
            $jsonData['color'] = $this->color;
        }
        if ($this->tag) {
            $jsonData['tag'] = $this->tag;
        }

        if ($this->bodyLocKey) {
            $jsonData['body_loc_key'] = $this->bodyLocKey;
        }
        if ($this->bodyLocArgs) {
            $jsonData['body_loc_args'] = $this->bodyLocArgs;
        }
        if ($this->titleLocKey) {
            $jsonData['title_loc_key'] = $this->titleLocKey;
        }
        if ($this->titleLocArgs) {
            $jsonData['title_loc_args'] = $this->titleLocArgs;
        }

        return $jsonData;
    }
}