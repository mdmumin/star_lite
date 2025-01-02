<?php

namespace Database\Seeders\Management;

use App\Models\Management\SettingTitle;
use App\Models\Management\SettingValue;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     public function setting_save($settings)
    {
        foreach ($settings as $title) {
            $setting_title = SettingTitle::create([
                'title' => $title['title'],
            ]);

            foreach ($title['values'] as $value) {
                SettingValue::create([
                    'setting_title_id' => $setting_title->id,
                    'title' => $setting_title->title,
                    'value' => $value['value'],
                ]);
            }
        }
    }
    public function run()
    {
        SettingTitle::truncate();
        SettingValue::truncate();

        $basic_settings = [
            [

                "title" => "header_logo",
                "values" => [
                    [
                        "value" => "frontend/assets/images/website_logo/logo.png",
                    ],
                ]
            ],

            [

                "title" => "footer_logo",
                "values" => [
                    [
                        "value" => "frontend/assets/images/website_logo/logo.png",

                    ],
                ]
            ],
            [

                "title" => "fabicon",
                "values" => [
                    [
                        "value" => "frontend/assets/images/website_logo/logo.png",

                    ],
                ]
            ],
            [

                "title" => "map_link",
                "values" => [
                    [
                        "value" => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d913.3593487015432!2d90.43766941951073!3d23.696069526706054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b9c39e0b3a4f%3A0xa249612c2652875b!2sMuradpur%20Islamia%20Alim%20Madrasha%2C%20Dhaka%201204!5e0!3m2!1sen!2sbd!4v1696486262231!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',

                    ],
                ]
            ],
            [

                "title" => "address_bangla",
                "values" => [
                    [
                        "value" => "মাদ্রাসা রোড, জুরাইন, ঢাকা-১২০৪",

                    ],
                ]
            ],
            [

                "title" => "address_english",
                "values" => [
                    [
                        "value" => "মাদ্রাসা রোড, জুরাইন, ঢাকা-১২০৪৭ নং, মাদ্রাসা রোড, কদমতলী, ঢাকা-১২০৪",

                    ],
                ]
            ],
            [

                "title" => "copy_right",
                "values" => [
                    [
                        "value" => "স্বত্ব © 2023| মুরাদপুর ইসলামিয়া আলিম মাদ্রাসা কর্তৃক সর্বস্বত্ব সংরক্ষিত",

                    ],
                ]
            ],
            [

                "title" => "institue_name_bangla",
                "values" => [
                    [
                        "value" => "মুরাদপুর ইসলামিয়া আলিম মাদ্রাসা",

                    ],
                ]
            ],
            [

                "title" => "institue_name_english",
                "values" => [
                    [
                        "value" => "Muradpur Islamia Alim Madrasa",

                    ],
                ]
            ],
            [

                "title" => "institue_name_arabic",
                "values" => [
                    [
                        "value" => "مدرسة مرادبور الإسلامية عليم",
                    ],
                ]
            ],
            [

                "title" => "institute_code",
                "values" => [
                    [
                        "value" => "11012",
                    ],
                ]
            ],
            [

                "title" => "eiin",
                "values" => [
                    [
                        "value" => "108480",
                    ],
                ]
            ],

            [

                "title" => "total_teachers",
                "values" => [
                    [
                        "value" => "50",
                    ],
                ]
            ],
            [

                "title" => "total_students",
                "values" => [
                    [
                        "value" => "1000",
                    ],
                ]
            ],
            [

                "title" => "exam_passing_rate",
                "values" => [
                    [
                        "value" => "85",
                    ],
                ]
            ],
            [

                "title" => "intro_video",
                "values" => [
                    [
                        "value" => '<iframe width="1116" height="600" src="https://www.youtube.com/embed/71hi9H6fZuc" title="Nasheed Ya Adheeman - Ahmed Bukhatir  نشيد يا عظيما - أحمد بوخاطر - Arabic Music Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                    ],
                ]
            ],
            [

                "title" => "principal_message",
                "values" => [
                    [
                        "value" => 'বিসমিল্লাহির রাহমানির রাহীম । সকল প্রশংসা জ্ঞাপন করছি মহান আল্লাহ তা‘আলার দরবারে । মেধা ও প্রতিভা নিয়ে পৃথিবীতে কেউ জন্মায় না । প্রতিভা ও মেধার বিকাশ ঘটাতে হয় । জন্ম নিলেই মানুষ মানুষ হয় না, মনুষ্যত্ব দিয়ে তাকে মানুষ বানাতে হয়। পিতামাতা হলও সন্তানদের জন্য পৃথিবীর শ্রেষ্ঠতম অধ্যাপক এবং পরিবারই হল সবচেয়ে বড় বিদ্যাপীঠ । শিক্ষা প্রতিষ্ঠান হল মেধা ও প্রতিভা বিকাশের অন্যতম স্থান। রাব্বুল আলামিন আমাদের সবাইকে হেফাজত করুন।',
                    ],
                ]
            ],
            [

                "title" => "principal_name",
                "values" => [
                    [
                        "value" => "মোঃ আশরাফুল আলম",
                    ],
                ]
            ],
            [

                "title" => "principal_type",
                "values" => [
                    [
                        "value" => "ভারপ্রাপ্ত",
                    ],
                ]
            ],
            [

                "title" => "principal_image",
                "values" => [
                    [
                        "value" => "frontend/assets/images/principal_image/teacher2.jpeg",
                    ],
                ]
            ],
        ];

        $this->setting_save($basic_settings);

        $contact_information_settings = [
            [
                "group" => "contact_information",
                "title" => "phone_numbers",
                "values" => [
                    [
                        "value" => "+8801309108480",
                    ],
                    [
                        "value" => "+8801731879474",
                    ],
                    [
                        "value" => "+8801718518981",
                    ],
                ]
            ],
            [
                "group" => "contact_information",
                "title" => "whatsapp",
                "values" => [
                    [
                        "value" => "",
                    ],
                ]
            ],
            [
                "group" => "contact_information",
                "title" => "telegram",
                "values" => [
                    [

                        "value" => "",
                    ],
                ]
            ],
            [
                "group" => "contact_information",
                "title" => "emails",
                "values" => [
                    [
                        "value" => "miam.jurain@gmail.com",

                    ],
                    [
                        "value" => "",

                    ],
                    [
                        "value" => "",

                    ],

                ]
            ],
        ];

        $this->setting_save($contact_information_settings);

        $social_media_settings = [
            [
                "group" => "social_media",
                "title" => "facebook",
                "values" => [
                    [
                        "value" => "https://www.facebook.com/miamjuraindhaka/",

                    ],
                ]
            ],
            [
                "group" => "social_media",
                "title" => "youtube",
                "values" => [
                    [
                        "value" => "https://www.youtube.com/@miamjuraindhaka",

                    ],
                ]
            ],
            [
                "group" => "social_media",
                "title" => "instagram",
                "values" => [
                    [
                        "value" => "https://www.instagram.com/@miamjuraindhaka",

                    ],
                ]
            ],
            [
                "group" => "social_media",
                "title" => "linkedin",
                "values" => [
                    [
                        "value" => "https://bd.linkedin.com/company/miamjuraindhaka",

                    ],
                ]
            ],

            [
                "group" => "social_media",
                "title" => "twitter",
                "values" => [
                    [
                        "value" => "https://twitter.com/company/miamjuraindhaka",
                    ],
                ]
            ],
        ];

        $this->setting_save($social_media_settings);

        $seo_settings = [
            [
                "group" => "seo",
                "title" => "title",
                "values" => [
                    [
                        "value" => "মুরাদপুর ইসলামিয়া আলিম মাদরাসা",

                    ],
                ]
            ],
            [
                "group" => "seo",
                "title" => "description",
                "values" => [
                    [
                        "value" => "শিক্ষা প্রতিষ্ঠান মেধা ও প্রতিভা বিকাশের অন্যতম স্থান",

                    ],
                ]
            ],
            [
                "group" => "seo",
                "title" => "image",
                "values" => [
                    [
                        "value" => "frontend/assets/images/website_logo/logo.png",

                    ],
                ]
            ],
            [
                "group" => "seo",
                "title" => "keywords",
                "values" => [
                    [
                        "value" => "মুরাদপুর ইসলামিয়া আলিম মাদরাসা,Muradpur Islamia Alim Madrasa, Jurain, Dhaka,মুরাদপুর-ইসলামিয়া-আলিম-মাদরাসা,Muradpur-Islamia-Alim-Madrasa",

                    ],
                ]
            ],
            [
                "group" => "seo",
                "title" => "tag",
                "values" => [
                    [
                        "value" => "মুরাদপুর ইসলামিয়া আলিম মাদরাসা,Muradpur Islamia Alim Madrasa, Jurain, Dhaka,মুরাদপুর-ইসলামিয়া-আলিম-মাদরাসা,Muradpur-Islamia-Alim-Madrasa",

                    ],
                ]
            ],
            [
                "group" => "seo",
                "title" => "schema_tag",
                "values" => [
                    [
                        "value" => "মুরাদপুর ইসলামিয়া আলিম মাদরাসা,Muradpur Islamia Alim Madrasa, Jurain, Dhaka,মুরাদপুর-ইসলামিয়া-আলিম-মাদরাসা,Muradpur-Islamia-Alim-Madrasa",

                    ],
                ]
            ],
        ];

        $this->setting_save($seo_settings);

        $term_pages = [
            [
                "group" => "term_pages",
                "title" => "institute_short_intro",
                "values" => [
                    [
                        "value" => $this->short_intro(),
                    ],
                ]
            ],
            [
                "group" => "term_pages",
                "title" => "institute_long_intro",
                "values" => [
                    [
                        "value" => $this->long_intro(),
                    ],
                ]
            ],
            [
                "group" => "term_pages",
                "title" => "terms_and_condition",
                "values" => [
                    [
                        "value" => "terms_and_condition",

                    ],
                ]
            ],
            [
                "group" => "term_pages",
                "title" => "refund_policy",
                "values" => [
                    [

                        "value" => "refund_policy",

                    ],
                ]
            ],
            [
                "group" => "term_pages",
                "title" => "coockies_policy",
                "values" => [
                    [

                        "value" => "coockies_policy",

                    ],
                ]
            ],
            [
                "group" => "term_pages",
                "title" => "sitemap",
                "values" => [
                    [
                        "value" => $this->site_map(),

                    ],
                ]
            ],
        ];

        $this->setting_save($term_pages);
    }

    public function site_map()
    {
        return "
            <div class=\"sitemap_heading\">Sitemap</div>
            <div class=\"sitemap_details\">
                <div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">হোম</h2>
                        <ul>
                            <li><a href=\"#\">হেডলাইন</a></li>
                            <li><a href=\"#\">কোর্স লিস্ট</a></li>
                            <li><a href=\"#\">কোর্স ফিচার</a></li>
                            <li><a href=\"#\">আর্নিং স্টেপস</a></li>
                            <li><a href=\"#\">সাকসেস স্টোরি</a></li>
                            <li><a href=\"#\">ট্রেইনারস</a></li>
                            <li><a href=\"#\">কাউনসিলিং</a></li>
                            <li><a href=\"#\">ফ্রি সেমিনার</a></li>
                            <li><a href=\"#\">আইটি সার্ভিসগুলো</a></li>
                            <li><a href=\"#\">আমরা যাদের সাথে কাজ করেছি</a></li>
                        </ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">ব্লগ</h2>
                        <ul>
                            <li><a href=\"#\">ব্লগ লিস্ট</a></li>
                            <li><a href=\"#\">ব্লগ ক্যাটাগরি</a></li>
                        </ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">ব্লগ ডিটেইলস</h2>
                        <ul></ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">ফ্রি সেমিনার</h2>
                        <ul>
                            <li><a href=\"#\">সেমিনার লিস্ট</a></li>
                            <li><a href=\"#\">কোর্স লিস্ট</a></li>
                        </ul>
                    </div>
                </div>
                <div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">আমাদের সম্পর্কে</h2>
                        <ul>
                            <li><a href=\"#\">আমাদের সম্পর্কে</a></li>
                            <li><a href=\"#\">আমরা যাদের সাথে কাজ করেছি</a></li>
                            <li><a href=\"#\">আমাদের মটো</a></li>
                            <li><a href=\"#\">আমাদের মিশন</a></li>
                            <li><a href=\"#\">আমাদের ভিশন</a></li>
                            <li><a href=\"#\">কোর্স লিস্ট</a></li>
                            <li><a href=\"#\">সার্ভিস লিস্ট</a></li>
                            <li><a href=\"#\">আমাদের টিম</a></li>
                            <li><a href=\"#\">ট্রেইনারস</a></li>
                        </ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">এফিলিয়েশন</h2>
                        <ul></ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">যোগাযোগ</h2>
                        <ul>
                            <li><a href=\"#\">যোগাযোগ নাম্বার</a></li>
                            <li><a href=\"#\">সাবমিট মেসেজ</a></li>
                            <li><a href=\"#\">অফিস লোকেশন</a></li>
                            <li><a href=\"#\">সাধারণ জিজ্ঞাসা</a></li>
                        </ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">টার্মস এন্ড কন্ডিশন</h2>
                        <ul></ul>
                    </div>
                </div>
                <div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">সাকসেস স্টোরি</h2>
                        <ul>
                            <li><a href=\"#\">সাকসেস স্টোরি ভিডিও</a></li>
                            <li><a href=\"#\">সাকসেস স্টোরি টেক্সট</a></li>
                        </ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">কোর্স লিস্ট</h2>
                        <ul>
                            <li><a href=\"#\">সকল কোর্স</a></li>
                            <li><a href=\"#\">গ্রাফিক্স ডিজাইন</a></li>
                            <li><a href=\"#\">ওয়েব ডেভোলাপমেন্ট</a></li>
                            <li><a href=\"#\">ডিজিটাল মার্কেটিং</a></li>
                        </ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">কোর্স ডিটেইলস</h2>
                        <ul>
                            <li><a href=\"#\">কোর্স ডিটেইলস</a></li>
                            <li><a href=\"#\">কোর্স এনরোলমেন্ট</a></li>
                            <li><a href=\"#\">কোর্স মডিউল</a></li>
                            <li><a href=\"#\">কোর্স প্রশিক্ষক</a></li>
                            <li><a href=\"#\">সাধারণ জিজ্ঞাসা</a></li>
                        </ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">রিফান্ড পলিসি</h2>
                        <ul></ul>
                        </div>
                        <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">প্রাইভেসি পলিসি</h2>
                        <ul></ul>
                    </div>
                </div>
                <div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">গ্যালারি</h2>
                        <ul>
                            <li><a href=\"#\">আমাদের টিম</a></li>
                            <li><a href=\"#\">ওরিয়েন্টেশন ক্লাস</a></li>
                            <li><a href=\"#\">ফেয়ারওয়েল ও সার্টিফিকেট প্রদান</a></li>
                        </ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">আইটি সার্ভিস</h2>
                        <ul>
                            <li><a href=\"#\">সার্ভিস লিস্ট</a></li>
                            <li><a href=\"#\">ক্লায়েন্ট রেটিং</a></li>
                            <li><a href=\"#\">আমরা যাদের সাথে কাজ করেছি</a></li>
                            <li><a href=\"#\">ক্লায়েন্ট প্রজেক্ট </a></li>
                            <li><a href=\"#\">Hire Us</a></li>
                        </ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">আইটি সার্ভিস ডিটেইলস</h2>
                        <ul>
                            <li><a href=\"#\">সার্ভিস ডিটেইলস</a></li>
                            <li><a href=\"#\">প্রাইসিং প্ল্যানিং</a></li>
                            <li><a href=\"#\">ক্লায়েন্ট প্রজেক্ট </a></li>
                            <li><a href=\"#\">Hire Us</a></li>
                        </ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">কুকিস পলিসি</h2>
                        <ul></ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">সার্টিফিকেট ভেরিফাই</h2>
                        <ul></ul>
                    </div>
                </div>
                </div>
                <div class=\"student_panel\">
                    <div class=\"student_panel_heading\">
                        <h2 class=\"student_panel_title\">স্টুডেন্ট প্যানেল</h2>
                        <div class=\"student_panel_border\"></div>
                    </div>
                    <div class=\"sitemap_details\">
                        <div>
                            <div class=\"sitemap_info\">
                                <h2 class=\"info_title\">হোম</h2>
                                <ul>
                                <li><a href=\"#\">চলমান কোর্স</a></li>
                                <li><a href=\"#\">কমপ্লিট কোর্স</a></li>
                                <li><a href=\"#\">অসম্পন্ন কোর্স</a></li>
                                </ul>
                            </div>
                            <div class=\"sitemap_info\">
                                <h2 class=\"continue_info_title\">চলমান কোর্স</h2>
                                <ul>
                                <li><a href=\"#\">কোর্সের অগ্রগতি</a></li>
                                <li><a href=\"#\">ক্লাস রুটিন</a></li>
                                <li><a href=\"#\">কোর্স মডিউল</a></li>
                                </ul>
                            </div>

                        </div>
                        <div>
                            <div class=\"sitemap_info\">
                                <h2 class=\"info_title\">প্রোফাইল সেটিংস</h2>
                                <ul>

                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class=\"sitemap_info\">
                                <h2 class=\"info_title\">পাসওয়ার্ড পরিবর্তন</h2>
                                <ul>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class=\"sitemap_info\">
                                <h2 class=\"info_title\">লগ আউট</h2>
                                <ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ";
    }
    public function short_intro()
    {
        return "
        আলহামদুলিল্লাহ, ওয়াসসালাতু ওয়াসসালামু আলা রাসূলিল্লাহ। আম্মা বা'দ- সর্বশ্রেষ্ঠ জাতি মুসলিম উম্মাহ। এ জাতি শিক্ষা, সংস্কৃতি, অর্থনীতি, রাজনীতির স্বকীয়তা হারিয়েছে অনেক আগেই। ভেঙ্গে চুরমার হয়েছে ঈমানী-আখলাকী বুনিয়াদ। বৃটিশোত্তর ভারতীয় উপমহাদেশ তার জলন্ত স্বাক্ষী। বহুমুখি সঙ্কটে নিপতিত হয় ইসলামের লালনভূমি বাংলাদেশ। ক্রমেই হারাতে থাকে ইসলামী মূল্যবোধ ও ঐতিহ্য। হুমকির মুখে পড়ে মুসলিম উম্মাহর নতুন প্রজন্ম। ষাটের দশক। নুয়ে পড়া সে উম্মাহকে জাগিয়ে তুলতে ও স্থবির দেহে প্রাণ ফিরিয়ে আনতে নতুন করে কদম ফেলে মুরাদপুর ইসলামিয়া আলিম মাদরাসা। ইসলাম ও সাধারণ শিক্ষার সমন্বয়ে একটি বাস্তবধর্মী শিক্ষা মিশনে তার পথচলা শুরু হয়। অব্যাহত পথচলার ধারাবাহিকতায় ১৯৯৭ সাল থেকে যুক্ত হয় মুরাদপুর ইসলামিয়া আলিম মাদরাসা ।";
    }
    public function long_intro()
    {
        return "
        আলহামদুলিল্লাহ, ওয়াসসালাতু ওয়াসসালামু আলা রাসূলিল্লাহ। আম্মা বা'দ- সর্বশ্রেষ্ঠ জাতি মুসলিম উম্মাহ। এ জাতি শিক্ষা, সংস্কৃতি, অর্থনীতি, রাজনীতির স্বকীয়তা হারিয়েছে অনেক আগেই। ভেঙ্গে চুরমার হয়েছে ঈমানী-আখলাকী বুনিয়াদ। বৃটিশোত্তর ভারতীয় উপমহাদেশ তার জলন্ত স্বাক্ষী। বহুমুখি সঙ্কটে নিপতিত হয় ইসলামের লালনভূমি বাংলাদেশ। ক্রমেই হারাতে থাকে ইসলামী মূল্যবোধ ও ঐতিহ্য। হুমকির মুখে পড়ে মুসলিম উম্মাহর নতুন প্রজন্ম। ষাটের দশক। নুয়ে পড়া সে উম্মাহকে জাগিয়ে তুলতে ও স্থবির দেহে প্রাণ ফিরিয়ে আনতে নতুন করে কদম ফেলে মুরাদপুর ইসলামিয়া আলিম মাদরাসা ট্রাস্ট। ইসলাম ও সাধারণ শিক্ষার সমন্বয়ে একটি বাস্তবধর্মী শিক্ষা মিশনে তার পথচলা শুরু হয়। অব্যাহত পথচলার ধারাবাহিকতায় ১৯৯৭ সাল থেকে যুক্ত হয় মুরাদপুর ইসলামিয়া আলিম মাদরাসা কামিল মাদ্রাসা ।
        যুগোপযোগী দক্ষ আলিমে দ্বীন এবং সমাজের সর্বস্তরের জন্য দেশপ্রেমিক, সৎ ও যোগ্য নাগরিক তৈরি। এ মিশনে আত্মনিয়োগ করে বিস্তৃত সবুজ ক্যাম্পাস। পাঠদান শুরু হয় প্রাক-প্রাথমিক থেকে কামিল শ্রেণি পর্যন্ত। দাখিল ও আলিম শ্রেণিতে সাধারণ ও বিজ্ঞান বিভাগ। সফলতার স্বাক্ষর রেখে এগিয়ে চলছে মুরাদপুর ইসলামিয়া আলিম মাদরাসা। ক্রমান্বয়ে বড় হতে থাকে কুরআনের ছাত্রদের এ আঙিনা। আগ্রহী ও উদ্দিগ্ন অভিভাবকরা অভাব অনুভব করেন মেয়েদের দ্বীনী শিক্ষার। ২০১২ সাল। অব্যাহত চাহিদার প্রেক্ষিতে প্রতিষ্ঠিত হয় তে বালিকা শাখা। ক্রমান্বয়ে শিশু থেকে কামিল পর্যন্ত পাঠ্যক্রমে যুক্ত হয় ছাত্রীরা। শিক্ষার্থীদের মানোন্নয়নে ক্রমান্বয়ে জোরদার হয়েছে ইলমে ক্বিরাআত ও আরবী ভাষা শিক্ষা কার্যক্রম। সময়োগযোগী আলিমে দ্বীন তৈরির জন্য গ্রহণ করা হয়েছে বিশেষ পদক্ষেপ। নিয়মিত ও সর্বাধিক ক্লাস, মাসিক ও সেমিস্টার পরীক্ষার মাধ্যমে নিবিড় পরিচর্যা এবং সহ-পাঠ কার্যক্রম ছাত্র-ছাত্রীদের মেধা ও প্রতিভা বিকাশে রাখছে কার্যকর ভূমিকা। জাতীয় পর্যায়ে শ্রেষ্ঠ শিক্ষা প্রতিষ্ঠান হিসাবে স্বীকৃতি, মাদ্রাসা বোর্ডও করেছে গৌরবান্বিত।
        আলহামদুলিল্লাহ! সূচনা থেকে আজ মুরাদপুর ইসলামিয়া আলিম মাদরাসা , পত্র-পল্লবে প্রস্ফুটিত একটি বৃক্ষ; যা ছড়িয়ে পড়েছে পৃথিবীর আনাচে-কানাচে। দেশ-বিদেশে অনুভূত হয় এর সুবাতাস। এর শিক্ষার্থীরা যোগ্য দায়ী ইলাল্লাহ হওয়ার লক্ষ্যে ছুটে চলছে বিভিন্ন খ্যাতনামা বিশ্ববিদ্যালয়ে, অর্জন করছে দ্বীনের উচ্চতর জ্ঞান। আধুনিক কালের সব চ্যালেঞ্জ মোকাবিলায় নিজেদের উপস্থিতি জানান দিতে সক্ষম হয়েছে দ্বীনী এ মারকাযের শিক্ষার্থীরা। পেশাগত জীবনে এর শিক্ষার্থীদের সফলতা জাতির মাঝে আশার সঞ্চার করেছে। দীর্ঘ পথ-পরিক্রমায় প্রতিবন্ধকতার সকল দেয়াল মাড়াতে মহান রবের অফুরন্ত রহমত আমাদের একান্ত অবলম্বন। শিক্ষকমণ্ডলীর আন্তরিকতা, স্বপ্নবাজ শিক্ষার্থীদের দৃঢ় প্রত্যয় ও পরিশ্রম, অভিভাবকদের দু‘আ ও দেশে-বিদেশে সুধীদের ভালোবাসা আমাদের চলার পথে পাথেয়। গণপ্রজাতন্ত্রী বাংলাদেশ সরকারের শিক্ষা-প্রশাসনের সকল বিভাগের আন্তরিক সহযোগিতা, সর্বোপরি আল্লাহর রহমত আমাদের পথচলাকে করেছে মসৃণ ও সুদৃঢ় ।
        অভিষ্ট লক্ষ্যের তুলনায় আমাদের মনজিল বহুদুর। অবিরত পথচলায় পরিবর্তনমুখী এ পদক্ষেপ দীর্ঘ হবে ইনশাআল্লাহ। প্রত্যাশা করি, সুদূরের সে পথ পাড়ি দিতে সত্য ও সুন্দরের প্রত্যাশী সবাই মুরাদপুর ইসলামিয়া আলিম মাদরাসাের সাথে আছেন এবং অনাগত দিনগুলোতেও সদয় থাকবেন। আল্লাহ তা‘আলা আমাদের সকল সীমাবদ্ধতা মাড়িয়ে সীরাতে মুস্তাকীমের উপর অটল থাকার তাওফীক দিন। আমীন!";
    }
}
